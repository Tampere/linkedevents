<?php

namespace Transformers;

class KeywordTransformer extends Transformer
{

    public function transform($keyword)
    {
        $payload = [
            'id' => $keyword->id,
            'aggregate' => (boolean)$keyword->aggregate,
            'data_source' => $keyword->data_source_id,
            'name' => json_decode($keyword->name),
            '@id' => url('keyword/' . $keyword->id),
            '@context' => 'http://schema.org',
            '@type' => 'Keyword',
        ];

        return $payload;
    }
}