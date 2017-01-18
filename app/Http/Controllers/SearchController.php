<?php

namespace App\Http\Controllers;

use App\Event;
use Transformers\EventTransformer;

class SearchController extends Controller
{
    protected $transformer;

    /**
     * SearchController constructor.
     * @param EventTransformer $transformer
     */
    public function __construct(EventTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    public function index()
    {
        if(!request('q')) {
            return [
                'detail' => "Supply search terms with 'q='"
            ];
        }

        $events = Event::search(request('q'))->paginate(25);

        //$events->load('location', 'offer', 'keywords');

        return $this->respond([
            'meta' => [
                'count' => $events->total(),
                'next' => $events->nextPageUrl(),
                'previous' => $events->previousPageUrl()
            ],
            'data' => $this->transformer->transformCollection($events->all())
        ]);
    }
}
