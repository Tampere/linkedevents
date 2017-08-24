<?php

namespace App;

use App\Filters\EventFilters;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Event extends Model
{
    use Searchable;

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $with = ['location', 'offer', 'keywords'];

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
        return $this->hasOne(Place::class);
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

    public function scopeFilter($query, EventFilters $filters)
    {
        return $filters->apply($query);
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
