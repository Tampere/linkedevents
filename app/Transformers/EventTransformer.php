<?php
namespace Transformers;

class EventTransformer extends Transformer
{
    public function transform($item)
    {
        $payload = [
            'id' => $item->id,
            '@id' => url('/event/' . $item->id),
            '@context' => 'http://schema.org',
            '@type' => 'Event/LinkedEvent',
            'location' => $this->transformLocation($item->location),
            'name' => json_decode($item->name_tr),
            'name_tr' => $item->name_tr,
            'description' => json_decode($item->description_tr),
            'super_event' => $item->super_event_id,
            'last_modified_time' => is_null($item->updated_at) ? null : $item->updated_at->toIso8601String(),
            'info_url' => json_decode($item->info_url_tr),
            'date_published' => is_null($item->date_published) ? null : $item->date_published->toIso8601String(),
            'image' => $item->image,
            'offers' => [
                $this->transformOffers($item->offer),
            ],
            'keywords' => $this->transformKeywords($item->keywords),
        ];

        if($item->is_recurring_super) {
            $payload['sub_events'] = $this->mapSubEventIds($item->children->pluck('id')->toArray());
        } else {
            $payload['start_time'] = is_null($item->start_time) ? null : $item->start_time->toIso8601String();
            $payload['end_time'] = is_null($item->end_time) ? null : $item->end_time->toIso8601String();
        }

        return $payload;
    }

    protected function mapSubEventIds(array $subEventIds)
    {
        return array_map(function($id) {
            return [
                '@id' => url('/event/' . $id)
            ];
        }, $subEventIds);
    }

    private function transformLocation($location)
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

    private function transformOffers($offer)
    {
        $payload = [
            'is_free' => (boolean)$offer->is_free,
            'description' => json_decode($offer->description_tr),
            'price' => json_decode($offer->price_tr),
            'info_url' => json_decode($offer->info_url_tr)
        ];

        return $payload;
    }

    private function transformKeywords($keywords)
    {
        $payload = [];

        foreach($keywords as $keyword)
        {
            $payload[] = $this->transformKeyword($keyword);
        }

        return $payload;
    }

    private function transformKeyword($keyword)
    {
        $payload = [
            'id' => $keyword->id,
            'aggregate' => (boolean)$keyword->aggregate,
            'data_source' => $keyword->data_source_id,
            'name' => json_decode($keyword->name_tr),
            '@id' => url('keyword/' . $keyword->id),
            '@context' => 'http://schema.org',
            '@type' => 'Keyword',
        ];

        return $payload;
    }
}