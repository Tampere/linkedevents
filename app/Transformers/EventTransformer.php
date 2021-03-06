<?php
namespace Transformers;

class EventTransformer extends Transformer
{
    public function transform($item)
    {
        $payload = [
            'id' => $item->id,
            '@id' => url('/v1/event/' . $item->id),
            '@context' => 'http://schema.org',
            '@type' => 'Event/LinkedEvent',
            'location' => $this->transformLocation($item->location),
            'name' => json_decode($item->name),
            'description' => json_decode($item->description),
            'super_event' => $item->super_event_id,
            'last_modified_time' => is_null($item->updated_at) ? null : $item->updated_at->toIso8601String(),
            'info_url' => json_decode($item->info_url),
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
                '@id' => url('/v1/event/' . $id)
            ];
        }, $subEventIds);
    }

    private function transformLocation($location)
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

    private function transformOffers($offer)
    {
        $payload = [
            'is_free' => (boolean)$offer->is_free,
            'description' => json_decode($offer->description),
            'price' => json_decode($offer->price),
            'info_url' => json_decode($offer->info_url)
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
            'name' => json_decode($keyword->name),
            '@id' => url('keyword/' . $keyword->id),
            '@context' => 'http://schema.org',
            '@type' => 'Keyword',
        ];

        return $payload;
    }
}