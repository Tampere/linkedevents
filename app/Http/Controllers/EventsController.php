<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Transformers\EventTransformer;


class EventsController extends Controller
{
    /**
     * @var \Transformers\EventTransformer
     */
    protected $eventTransformer;

    public function __construct(EventTransformer $eventTransformer)
    {
        $this->eventTransformer = $eventTransformer;
    }

    public function index()
    {
        $events = Event::with('location')->paginate(5);

        return $this->respond([
            'meta' => [
                'count' => $events->total(),
                'next' => $events->nextPageUrl(),
                'previous' => $events->previousPageUrl()
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
