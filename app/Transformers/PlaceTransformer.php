<?php

namespace Transformers;

class PlaceTransformer extends Transformer
{

    public function transform($location)
    {
        $payload = [
            'id' => $location->id,
            '@id' => url('/v1/place/' . $location->id),
            '@context' => 'http://schema.org',
            '@type' => 'Place',
            'name' => json_decode($location->name),
            'street_address' => json_decode($location->street_address),
            'address_region' => $location->address_region,
            'postal_code' => $location->postal_code,
            'data_source_id' => $location->data_source_id,
        ];

        return $payload;
    }
}