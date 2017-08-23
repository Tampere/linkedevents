<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keywords extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $casts = [
        'name' => 'json'
    ];

    protected static $langs = [
        'fi',
        'en',
        'ru'
    ];

    public function event()
    {
        return $this->belongsToMany(Event::class);
    }

    public static function getOrCreateKeywordId($tag, $context)
    {
        $keyword = self::find("$context:$tag");

        if(!$keyword) {
            $keyword = self::create([
                'id' => "$context:$tag",
                'name' => $tag,
                'data_source_id' => $context,
            ]);
        }

        return $keyword->id;
    }
}
