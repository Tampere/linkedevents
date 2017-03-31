<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keywords extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $casts = [
        'name_tr' => 'json'
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
        $keyword = self::firstOrNew(['name' => $tag]);
        if(!$keyword->exists) {
            $keyword->id = "$context:$tag";
            $keyword->name_tr = self::getRepeatingTranslatedJson($tag);
            $keyword->data_source_id = $context;
            $keyword->save();
        }

        return $keyword->id;
    }

    private static function getRepeatingTranslatedJson($link)
    {
        $str = '{';
        foreach(self::$langs as $lang) {
            $str .= '"'.$lang.'":"'.$link.'",';
        }
        $str = substr($str, 0, -1);
        $str .= '}';

        return $str;
    }
}
