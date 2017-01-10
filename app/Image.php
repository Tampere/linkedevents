<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function license()
    {
        return $this->hasOne(License::class);
    }
}
