<?php

namespace App\Http\Controllers;

use App\Place;
use Transformers\PlaceTransformer;

class PlacesController extends Controller
{
    protected $transformer;

    /**
     * PlacesController constructor.
     * @param PlaceTransformer $transformer
     */
    public function __construct(PlaceTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    public function index()
    {
        $places = Place::paginate(25);

        return $this->respond([
            'meta' => [
                'count' => $places->total(),
                'next' => $places->nextPageUrl(),
                'previous' => $places->previousPageUrl()
            ],
            'data' => $this->transformer->transformCollection($places->all())
        ]);
    }

    public function show($id)
    {
        $place = Place::find($id);

        if(!$place) {
            return $this->respondNotFound();
        }

        return $this->respond([
            'data' => $this->transformer->transform($place)
        ]);
    }
}
