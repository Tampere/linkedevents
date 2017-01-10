<?php

namespace Transformers;

class PlaceTransformer extends Transformer
{

    public function transform($location)
    {
        $payload = [
            'id' => $location->id,
            '@id' => url('/place/' . $location->id),
            '@context' => 'http://schema.org',
            '@type' => 'Place',
            'name' => json_decode($location->name_tr),
            'street_address' => json_decode($location->street_address_tr),
            'address_region' => $location->address_region,
            'postal_code' => $location->postal_code,
            'data_source_id' => $location->data_source_id,
        ];

        return $payload;
    }
}