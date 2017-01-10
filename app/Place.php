<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $casts = [
        'name_tr' => 'json',
        'info_url_tr' => 'json',
        'street_address_tr' => 'json',
        'address_locality_tr' => 'json',
        'postal_code' => 'integer'
    ];

}
