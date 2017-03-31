<?php

use App\Event;
use App\Keywords;
use App\Offer;
use App\Place;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class FromFileSeeder extends Seeder
{
    protected $lang = "fi";

    protected $langs = [
        'fi',
        'en',
        'ru'
    ];

    protected $data = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startTime = microtime(true);
        $this->command->info("Begin import at {$startTime}");
        foreach($this->langs as $lang) {
            $json[$lang] = file_get_contents("https://visittampere.fi/api/search?type=event&limit=20000&lang={$lang}");
            $this->data[$lang] = json_decode($json[$lang]);
        }

        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                echo ' - No errors';
                break;
            case JSON_ERROR_DEPTH:
                echo ' - Maximum stack depth exceeded';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                echo ' - Underflow or the modes mismatch';
                break;
            case JSON_ERROR_CTRL_CHAR:
                echo ' - Unexpected control character found';
                break;
            case JSON_ERROR_SYNTAX:
                echo ' - Syntax error, malformed JSON';
                break;
            case JSON_ERROR_UTF8:
                echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
                break;
            default:
                echo ' - Unknown error';
                break;
        }

        $this->command->info('JSON is valid!');

        foreach($this->langs as $lang) {
            foreach ($this->data[$lang] as $event) {
                if ($this->eventExists($event)) {
                    $this->command->info("Event exists 'visittampere:$event->item_id'");
                    Log::info("Event exists 'visittampere:$event->item_id', updating");
                    if ($this->eventNeedsUpdate($event)) {
                        $this->command->info("Event needs update 'visittampere:$event->item_id'");
                        Log::info("Event needs update 'visittampere:$event->item_id'");
                        $this->updateEvent($event);
                    } else {
                        continue;
                    }
                }
                $this->command->info("Creating a new event 'visittampere:$event->item_id'");
                Log::info("Creating a new event 'visittampere:$event->item_id'");
                $this->parseEvent($event);
            }
        }
        $this->command->info("Elapsed time is: ". (microtime(true) - $startTime) ." seconds");
    }

    protected function parseEvent($event)
    {
        $keywordIds = $this->convertTagsToKeywords($event->tags);

        $isRecurringSuper = false;
        if(count($event->times) > 0) {
            $isRecurringSuper = true;
        }

        $events = [];
        $subEvents = [];
        $place = Place::forceCreate([
            'id' => 'visittampere:'.$event->item_id,
            'name' => $event->contact_info->address,
            'name_tr' => $this->getRepeatingTranslatedJson($event->contact_info->address),
            'street_address' => $event->contact_info->address,
            'street_address_tr' => $this->getRepeatingTranslatedJson($event->contact_info->address),
            'postal_code' => $event->contact_info->postcode,
            'address_region' => $event->contact_info->city,
            'telephone' => $event->contact_info->phone,
            'telephone_tr' => $event->contact_info->phone ? $this->getRepeatingTranslatedJson($event->contact_info->phone) : null,
            'email' => $event->contact_info->email,
            'info_url' => $event->contact_info->link,
            'info_url_tr' => $event->contact_info->link ? $this->getRepeatingTranslatedJson($event->contact_info->link) : null,
            'data_source_id' => 'visittampere'
        ]);

        //Generate offers
        $offer = Offer::create([
            'info_url' => $event->ticket_link,
            'info_url_tr' => $event->ticket_link ? $this->getRepeatingTranslatedJson($event->ticket_link) : null,
            'is_free' => $event->is_free === null ? false : $event->is_free,
        ]);

        $newevent = $this->createSingleEvent($event, $keywordIds, $isRecurringSuper, $place->id, $offer->id);
        array_push($events, $newevent);

        if(count($event->times) > 0) {
            $subEvents = $this->createSubEvents($newevent, $event);
        }

        foreach($subEvents as $subEvent) {
            $subEvent->keywords()->attach($keywordIds);
        }
    }

    /**
     * @param $tags
     * @return array
     */
    private function convertTagsToKeywords($tags)
    {
        $keywordIds = [];
        foreach($tags as $tag) {
            $keywordId = Keywords::getOrCreateKeywordId($tag, 'visittampere', $this->lang);
            array_push($keywordIds, $keywordId);
        }
        return $keywordIds;
    }

    private function getTranslatedJson($item_id, $column)
    {
        $str = '{';
        foreach($this->langs as $lang) {
            foreach ($this->data[$lang] as $otherevent) {
                if ($otherevent->item_id == $item_id) {
                    $str .= '"'.$lang.'":"'.$otherevent->$column.'",';
                }
            }
        }
        $str = substr($str, 0, -1);
        $str .= '}';

        return $str;
    }

    private function getRepeatingTranslatedJson($link)
    {
        $str = '{';
        foreach($this->langs as $lang) {
            $str .= '"'.$lang.'":"'.$link.'",';
        }
        $str = substr($str, 0, -1);
        $str .= '}';

        return $str;
    }

    private function createSingleEvent($event, $keywordIds, $isRecurringSuper, $place_id, $offer_id)
    {
        $newevent = new Event;
        $newevent->fill([
            'id' => "visittampere:$event->item_id",
            'name' => $event->title,
            'name_tr' => $this->getTranslatedJson($event->item_id, 'title'),
            'description' => $event->description,
            'description_tr' => $this->getTranslatedJson($event->item_id, 'description'),
            'start_time' => is_null($event->start_datetime) ? null : substr($event->start_datetime, 0, -3),
            'end_time' => is_null($event->end_datetime) ? null : substr($event->end_datetime, 0, -3),
            'has_start_time' => !is_null($event->start_datetime),
            'has_end_time' => !is_null($event->end_datetime),
            'date_published' => is_null($event->created_at) ? null : substr($event->created_at, 0, -3),
            'image' => isset($event->image) ? $event->image->src : null,
            'is_recurring_super' => $isRecurringSuper,
            'place_id' => $place_id,
            'info_url' => $event->contact_info->link,
            'info_url_tr' => $event->contact_info->link ? $this->getRepeatingTranslatedJson($event->contact_info->link) : null,
            'offer_id' => $offer_id,
        ]);

        $newevent->save();
        $newevent->keywords()->attach($keywordIds);

        return $newevent;
    }

    private function createSubEvents($event, $original)
    {
        $subEvents = [];
        foreach ($original->times as $time) {
            $newEvent = $event->replicate();
            $newEvent->start_time = substr($time->start_datetime, 0, -3);
            $newEvent->end_time = substr($time->end_datetime, 0, -3);
            $newEvent->has_start_time = true;
            $newEvent->has_end_time = true;
            $newEvent->is_recurring_super = false;
            $newEvent->super_event_id = $event->id;
            $newEvent->id = "visittampere:$time->id";
            $newEvent->save();
            array_push($subEvents, $newEvent);
        }

        return $subEvents;
    }

    private function eventExists($event)
    {
        return Event::where("id", "visittampere:$event->item_id")->exists();
    }

    private function eventNeedsUpdate($event)
    {
        $lastUpdateTime = Carbon::createFromTimestamp(substr($event->updated_at, 0, -3));
        return Event::find("visittampere:$event->item_id")->updated_at < $lastUpdateTime;
    }

    private function updateEvent($event)
    {
        $ref = Event::find("visittampere:$event->item_id");
        $children = $ref->children();
        foreach($children as $child) {
            Place::where('id', $child->location_id)->delete();
        }
        $children->delete();
        $ref->delete();
    }
}
