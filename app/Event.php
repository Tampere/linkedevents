<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
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
}
