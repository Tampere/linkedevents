<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
