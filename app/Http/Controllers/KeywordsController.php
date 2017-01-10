<?php

namespace App\Http\Controllers;

use App\Keywords;
use Transformers\KeywordTransformer;

class KeywordsController extends Controller
{
    protected $transformer;

    /**
     * KeywordsController constructor.
     * @param KeywordTransformer $transformer
     */
    public function __construct(KeywordTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    public function index()
    {
        $keywords = Keywords::paginate(25);

        return $this->respond([
            'meta' => [
                'count' => $keywords->total(),
                'next' => $keywords->nextPageUrl(),
                'previous' => $keywords->previousPageUrl()
            ],
            'data' => $this->transformer->transformCollection($keywords->all())
        ]);
    }

    public function show($id)
    {
        $keyword = Keywords::find($id);

        if(!$keyword) {
            return $this->respondNotFound();
        }

        return $this->respond([
            'data' => $this->transformer->transform($keyword)
        ]);
    }
}
