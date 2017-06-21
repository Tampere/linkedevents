<?php

namespace App\Http\Controllers;

use App\Event;
use App\Keywords;
use Illuminate\Http\Request;
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

    public function index()
    {
        $events = Event::with(['location', 'offer', 'keywords'])
            ->keywords()
            ->startsAt()
            ->endsAt()
            ->orderBy('start_time', 'desc')
            ->paginate(25);

        $parameters = (request('start') ? '&start='.request('start') : '') .
            (request('end') ? '&end='.request('end') : '') .
            (request('keyword') ? '&keyword='.request('keyword') : '');

        return $this->respond([
            'meta' => [
                'count' => $events->total(),
                'next' => $events->nextPageUrl() ? $events->nextPageUrl() . $parameters : null,
                'previous' => $events->previousPageUrl() ? $events->previousPageUrl() . $parameters : null,
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
}
