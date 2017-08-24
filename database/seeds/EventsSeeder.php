<?php

use App\Event;
use App\Keywords;
use App\Place;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class EventsSeeder extends Seeder
{
    protected $langs = [
        'fi',
        'en',
        'ru',
    ];

    protected $output;

    protected $data = [];

    protected $eventIdsAdded = [];

    protected $eventsToAdd;

    protected $existingEvents;
    protected $existingEventIds = [];

    public function __construct()
    {
        $this->eventsToAdd = new Collection();
        $this->existingEvents = new Collection();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startTime = microtime(true);
        $this->command->info("Begin import at {$startTime}");
        $this->output = $this->command->getOutput();
        $this->existingEvents = Event::all(['id', 'updated_at']);
        $this->existingEventIds = $this->existingEvents->pluck('id')->toArray();

        $this->DownloadJsonData();

        $this->CheckJsonErrors();

        $this->ParseAndCombineMultilingualEventData();

        $this->command->info("Languages combined, we are left with {$this->eventsToAdd->count()} events.");

        $this->ProcessStandardEventData();

        $this->command->info("Events added and/or updated, now deleting events that are no longer in source data.");

        $this->deleteEventsNoLongerInSourceData();

        $this->command->info("Elapsed time is: ". (microtime(true) - $startTime) ." seconds");
    }

    public function CheckJsonErrors()
    {
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                echo ' - No errors';
                $this->command->info('JSON is valid!');
                break;
            case JSON_ERROR_DEPTH:
                echo ' - Maximum stack depth exceeded';
                $this->command->info('JSON is invalid!');
                break;
            case JSON_ERROR_STATE_MISMATCH:
                echo ' - Underflow or the modes mismatch';
                $this->command->info('JSON is invalid!');
                break;
            case JSON_ERROR_CTRL_CHAR:
                echo ' - Unexpected control character found';
                $this->command->info('JSON is invalid!');
                break;
            case JSON_ERROR_SYNTAX:
                echo ' - Syntax error, malformed JSON';
                $this->command->info('JSON is invalid!');
                break;
            case JSON_ERROR_UTF8:
                echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
                $this->command->info('JSON is invalid!');
                break;
            default:
                echo ' - Unknown error';
                $this->command->info('JSON is invalid!');
                break;
        }
    }

    public function DownloadJsonData()
    {
        $lngCount = count($this->langs);
        $currLngIter = 1;

        foreach ($this->langs as $lang) {
            $json[$lang] = file_get_contents("https://visittampere.fi/api/search?type=event&limit=20000&lang={$lang}");
            $this->command->info("[$currLngIter / $lngCount] Loaded lang: {$lang}");
            $this->data[$lang] = json_decode($json[$lang]);
            $this->command->info("Decoded lang: {$lang}");
            $currLngIter++;
        }
    }

    public function ParseAndCombineMultilingualEventData()
    {
        foreach ($this->langs as $lang) {
            $this->command->info("Now processing lang: {$lang}");
            $this->output->progressStart(count($this->data[$lang]));

            foreach ($this->data[$lang] as $event) {
                if ($matching = $this->eventsToAdd->where('item_id', $event->item_id)->first()) {
                    $matching->title[$lang] = $event->title;
                    $matching->description[$lang] = $event->description;
                } else {
                    $newEvent = new stdClass;
                    $newEvent->item_id = $event->item_id;
                    $newEvent->title[$lang] = $event->title;
                    $newEvent->description[$lang] = $event->description;
                    $newEvent->contact_info = $event->contact_info;
                    $newEvent->created_at = $event->created_at;
                    $newEvent->updated_at = $event->updated_at;
                    if (isset($event->image)) {
                        $newEvent->image = $event->image;
                    }
                    $newEvent->tags = $event->tags;
                    $newEvent->is_free = $event->is_free;
                    $newEvent->ticket_link = $event->ticket_link;
                    $newEvent->start_datetime = $event->start_datetime;
                    $newEvent->end_datetime = $event->end_datetime;

                    $this->eventsToAdd->push($newEvent);
                }
                $this->output->progressAdvance();
            }
            $this->output->progressFinish();
        }
    }

    protected function parseEvent($event)
    {
        $keywordIds = $this->convertTagsToKeywords($event->tags);

        $this->createSingleEvent($event, $keywordIds);
    }

    /**
     * @param $tags
     * @return array
     */
    private function convertTagsToKeywords($tags)
    {
        $keywordIds = [];
        foreach($tags as $tag) {
            $keywordId = Keywords::getOrCreateKeywordId($tag, 'visittampere');
            array_push($keywordIds, $keywordId);
        }
        return $keywordIds;
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

    private function createSingleEvent($event, $keywordIds)
    {
        $newevent = Event::create([
            'id' => "visittampere:$event->item_id",
            'name' => json_encode($event->title),
            'description' => json_encode($event->description),
            'start_time' => is_null($event->start_datetime) ? null : substr($event->start_datetime, 0, -3),
            'end_time' => is_null($event->end_datetime) ? null : substr($event->end_datetime, 0, -3),
            'has_start_time' => !is_null($event->start_datetime),
            'has_end_time' => !is_null($event->end_datetime),
            'date_published' => is_null($event->created_at) ? null : substr($event->created_at, 0, -3),
            'image' => isset($event->image) ? $event->image->src : null,
            'is_recurring_super' => false,
            'info_url' => $event->contact_info->link ? $this->getRepeatingTranslatedJson($event->contact_info->link) : null,
        ]);

        $newevent->keywords()->attach($keywordIds);

        $newevent->offer()->create([
            'info_url' => $event->ticket_link ? $this->getRepeatingTranslatedJson($event->ticket_link) : null,
            'is_free' => $event->is_free === null ? false : $event->is_free,
        ]);

        $newevent->location()->create([
            'id' => 'visittampere:' . $event->item_id,
            'name' => $this->getRepeatingTranslatedJson($event->contact_info->address),
            'street_address' => $this->getRepeatingTranslatedJson($event->contact_info->address),
            'postal_code' => $event->contact_info->postcode,
            'address_region' => $event->contact_info->city,
            'telephone' => $event->contact_info->phone ? $this->getRepeatingTranslatedJson($event->contact_info->phone) : null,
            'email' => $event->contact_info->email,
            'info_url' => $event->contact_info->link ? $this->getRepeatingTranslatedJson($event->contact_info->link) : null,
            'data_source_id' => 'visittampere'
        ]);
    }

    private function eventExists($event)
    {
        return in_array("visittampere:{$event->item_id}", $this->existingEventIds);
    }

    private function eventNeedsUpdate($event)
    {
        $lastUpdateTime = Carbon::createFromTimestamp(substr($event->updated_at, 0, -3));
        return $this->existingEvents->where('id', "visittampere:{$event->item_id}")->first()->updated_at < $lastUpdateTime;
    }

    private function ProcessStandardEventData()
    {
        $this->output->progressStart($this->eventsToAdd->count());

        foreach($this->eventsToAdd as $event) {
            if($this->eventExists($event)) {
                if($this->eventNeedsUpdate($event)) {
                    $this->destroyEvent($event);
                }
            } else {
                $this->parseEvent($event);
                $this->eventIdsAdded[] = "visittampere:{$event->item_id}";
            }

            $this->output->progressAdvance();
        }

        $this->output->progressFinish();
    }

    private function destroyEvent($event)
    {
        Event::destroy("visittampere:{$event->item_id}");
        Place::destroy("visittampere:{$event->item_id}");
    }

    protected function deleteEventsNoLongerInSourceData()
    {
        $diffIds = array_diff($this->existingEvents->pluck('id')->toArray(), $this->eventIdsAdded);

        $affected = Event::whereIn('id', $diffIds)->delete();

        $this->command->info("Deleted $affected rows.");
    }
}