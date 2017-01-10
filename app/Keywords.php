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

    public function event()
    {
        return $this->belongsToMany(Event::class);
    }

    public static function getOrCreateKeywordId($tag, $context, $lang)
    {
        $keyword = self::firstOrNew(['name' => $tag]);
        if(!$keyword->exists) {
            $keyword->id = "$context:$tag";
            $keyword->name_tr = json_encode([
                $lang => $tag,
            ]);
            $keyword->data_source_id = $context;
            $keyword->save();
        }

        return $keyword->id;
    }
}
