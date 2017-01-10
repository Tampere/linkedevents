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
        'description_tr' => 'json',
        'name_tr' => 'json',
        'short_description_tr' => 'json',
        'info_url_tr' => 'json',
        'headline_tr' => 'json',
        'secondary_headline_tr' => 'json',
        'provider_tr' => 'json',
        'location_extra_info_tr' => 'json',
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
        return $this->hasOne(Place::class, 'id', 'place_id');
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
        return $this->hasOne(Offer::class, 'id', 'offer_id');
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

    /**
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Limit array somehow

        return $array;
    }
}
