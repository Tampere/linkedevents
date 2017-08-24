<?php

namespace App\Filters;

use Carbon\Carbon;
use DB;

class EventFilters extends Filters
{
    protected $filters = ['last_modified_since',
        'start',
        'end',
        'data_source',
        'keyword',
        'location',
        'recurring',
        'min_duration',
        'max_duration',
        'sort'
    ];

    protected function last_modified_since($time)
    {
        $time = $time == 'today' ? Carbon::now()->startOfDay() : $time;
        return $this->builder->where('updated_at', '>=', $time);
    }

    protected function start($time)
    {
        $time = $time == 'today' ? Carbon::now()->startOfDay() : $time;
        return $this->builder->where('start_time', '>=', $time);
    }

    protected function end($time)
    {
        $time = $time == 'today' ? Carbon::now()->startOfDay() : $time;
        return $this->builder->where('end_time', '<=', $time);
    }

    protected function data_source($source)
    {
        return $this->builder->where('data_source_id', $source);
    }

    protected function keyword($keywords)
    {
        return $this->builder->whereHas('keywords', function($q) use ($keywords) {
            $keywords = explode(',', $keywords);
            $q->whereIn('keywords.id', $keywords);
        });
    }

    protected function location($locations)
    {
        return $this->builder->whereHas('location', function($q) use ($locations) {
            $locations = explode(',', $locations);
            $q->whereIn('places.id', $locations);
        });
    }

    protected function recurring($type)
    {
        if($type == "super") {
            return $this->builder->whereNull('super_event_id');
        } else if ($type == "sub") {
            return $this->builder->whereNotNull('super_event_id');
        }
    }

    protected function min_duration($seconds)
    {
        return $this->builder->where(DB::raw('TIMESTAMPDIFF(SECOND, start_time, end_time)'), '>=', $seconds);
    }

    protected function max_duration($seconds)
    {
        return $this->builder->where(DB::raw('TIMESTAMPDIFF(SECOND, start_time, end_time)'), '<=', $seconds);
    }

    protected function sort($key)
    {
        $this->builder->getQuery()->orders = [];

        return $this->builder->orderBy($key, 'desc');
    }
}