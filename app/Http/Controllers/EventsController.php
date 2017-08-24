<?php

namespace App\Http\Controllers;

use App\Event;
use App\Filters\EventFilters;
use App\Keywords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Transformers\EventTransformer;


class EventsController extends Controller
{
    /**
     * @var \Transformers\EventTransformer
     */
    protected $eventTransformer;

    /**
     * EventsController constructor.
     * @param EventTransformer $eventTransformer
     */
    public function __construct(EventTransformer $eventTransformer)
    {
        $this->eventTransformer = $eventTransformer;
    }

    public function index(EventFilters $filters)
    {
        $events = $this->getEvents($filters);

        $parameters = (request('start') ? '&start='.request('start') : '') .
            (request('end') ? '&end='.request('end') : '') .
            (request('data_source') ? '&data_source='.request('data_source') : '') .
            (request('last_modified_since') ? '&last_modified_since='.request('last_modified_since') : '') .
            (request('recurring') ? '&recurring='.request('recurring') : '') .
            (request('min_duration') ? '&min_duration='.request('min_duration') : '') .
            (request('max_duration') ? '&max_duration='.request('max_duration') : '') .
            (request('sort') ? '&sort='.request('sort') : '') .
            (request('keyword') ? '&keyword='.request('keyword') : '');

        return $this->respond([
            'meta' => [
                'count' => $events->total(),
                'next' => $events->nextPageUrl() ? $events->nextPageUrl() . $parameters : null,
                'previous' => $events->previousPageUrl() ? $events->previousPageUrl() . $parameters : null,
                'parameters' => $parameters,
            ],
            'data' => $this->eventTransformer->transformCollection($events->all())
        ]);
    }

    public function show($id)
    {
        $event = Event::find($id);

        if(!$event) {
            return $this->respondNotFound();
        }

        return $this->respond([
            'data' => $this->eventTransformer->transform($event)
        ]);
    }

    private function getEvents(EventFilters $filters)
    {
        $events = Event::filter($filters);

        return $events->orderBy('start_time', 'desc')
            ->paginate(25);
    }
}
