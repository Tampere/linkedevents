<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Event extends Model
{
    use Searchable;

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $casts = [
        'description' => 'json',
        'name' => 'json',
        'short_description' => 'json',
        'info_url' => 'json',
        'headline' => 'json',
        'secondary_headline' => 'json',
        'provider' => 'json',
        'location_extra_info' => 'json',
        'date_published' => 'datetime',
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];

    public function keywords()
    {
        return $this->belongsToMany(Keywords::class);
    }

    public function location()
    {
        return $this->hasOne(Place::class, 'event_id', 'id');
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function children()
    {
        return $this->hasMany(Event::class, 'super_event_id', 'id');
    }

    public function parent()
    {
        return $this->hasOne(Event::class, 'id', 'super_event_id');
    }

    public function offer()
    {
        return $this->hasOne(Offer::class);
    }

    public function getSuperEventIdAttribute($id)
    {
        if($id === null) return $id;

        return [
            '@id' => url('/event/' . $id)
        ];
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeStartsAt($query)
    {
        if(request('start')) {
            return $query->where(
                'start_time',
                '>=',
                request('start') == 'today' ?
                    Carbon::now()->endOfDay()
                    : request('start'));
        }
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeEndsAt($query)
    {
        if(request('end')) {
            return $query->where(
                'end_time',
                '<=',
                request('end') == 'today' ?
                    Carbon::now()->endOfDay()
                    : request('end')
            );
        }
    }

    public function scopeKeywords($query)
    {
        if(request('keyword')) {
            $query->whereHas('keywords', function($q) {
                $keywords = explode(',', request('keyword'));
                $q->whereIn('keywords.id', $keywords);
            });
        }
    }

    /**
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'info_url' => $this->info_url,
            'description' => $this->description,
            'short_description' => $this->short_description,
            'headline' => $this->headline,
            'secondary_headline' => $this->secondary_headline,
            'location_extra_info' => $this->location_extra_info,
        ];
    }
}
