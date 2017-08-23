<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $casts = [
        'name' => 'json',
        'info_url' => 'json',
        'street_address' => 'json',
        'address_locality' => 'json',
        'postal_code' => 'integer'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
