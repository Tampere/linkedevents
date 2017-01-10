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
    protected $lang = "en";
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents("database/seeddata/10events.json");
        $data = json_decode($json);
        foreach($data as $event) {
            if($this->eventExists($event)) {
                Log::info("Event exists 'visittampere:$event->item_id'");
                if($this->eventNeedsUpdate($event)) {
                    Log::info("Event needs update 'visittampere:$event->item_id'");
                    $this->updateEvent($event);
                } else {
                    continue;
                }
            }
            Log::info("Creating a new event 'visittampere:$event->item_id'");
            $this->parseEvent($event);
        }
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
            'name_tr' => json_encode([
                $this->lang => $event->contact_info->address
            ]),
            'street_address' => $event->contact_info->address,
            'street_address_tr' => json_encode([
                $this->lang => $event->contact_info->address
            ]),
            'postal_code' => $event->contact_info->postcode,
            'address_region' => $event->contact_info->city,
            'telephone' => $event->contact_info->phone,
            'telephone_tr' => $event->contact_info->phone ? json_encode([
                $this->lang => $event->contact_info->phone,
            ]) : null,
            'email' => $event->contact_info->email,
            'info_url' => $event->contact_info->link,
            'info_url_tr' => $event->contact_info->link ? json_encode([
                $this->lang => $event->contact_info->link,
            ]) : null,
            'data_source_id' => 'visittampere'
        ]);

        //Generate offers
        $offer = Offer::create([
            'info_url' => $event->ticket_link,
            'info_url_tr' => $event->ticket_link ? json_encode([
                $this->lang => $event->ticket_link,
            ]) : null,
            'is_free' => $event->is_free === null ? false : $event->is_free,
        ]);

        $newevent = $this->createSingleEvent($event, $keywordIds, $isRecurringSuper, $place->id, $offer->id);
        array_push($events, $newevent);

        if(count($event->times) > 0) {
            $subEvents = $this->createSubEvents($newevent, $event);
        }

        foreach($subEvents as $subEvent) {
            array_push($events, $subEvent);
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

    private function createSingleEvent($event, $keywordIds, $isRecurringSuper, $place_id, $offer_id)
    {
        $newevent = new Event;
        $newevent->fill([
            'id' => "visittampere:$event->item_id",
            'name' => $event->title,
            'name_tr' => json_encode([
                $this->lang => $event->title
            ]),
            'description' => $event->description,
            'description_tr' => json_encode([
                $this->lang => $event->description
            ]),
            'start_time' => is_null($event->start_datetime) ? null : substr($event->start_datetime, 0, -3),
            'end_time' => is_null($event->end_datetime) ? null : substr($event->end_datetime, 0, -3),
            'has_start_time' => !is_null($event->start_datetime),
            'has_end_time' => !is_null($event->end_datetime),
            'date_published' => is_null($event->created_at) ? null : substr($event->created_at, 0, -3),
            'image' => $event->image ? $event->image->src : null,
            'is_recurring_super' => $isRecurringSuper,
            'place_id' => $place_id,
            'info_url' => $event->contact_info->link,
            'info_url_tr' => $event->contact_info->link ? json_encode([
                $this->lang => $event->contact_info->link,
            ]) : null,
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
