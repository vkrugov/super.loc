<?php

namespace App;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\HeroHelper;

/**
 * Class Hero
 * @package App
 * @property integer $id
 * @property string $nickname
 * @property string $real_name
 * @property string $origin_description
 * @property string $catch_phrase
 * @property integer $updated_at
 * @property integer $created_at
 */
class Hero extends Model
{
    public $table = 'hero';
    public $timestamps = false;

    protected $fillable = [
        'id', 'nickname', 'real_name', 'origin_description', 'catch_phrase', 'last_updater', 'updated_at'
    ];
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        self::saving(function($model){
            if (!isset($model->attributes['created_at'])) {
                $model->attributes['created_at'] = !empty($model->attributes['created_at']) ? $model->attributes['created_at'] : time();
            }
        });
    }

    /**
     * @param $from
     * @return Collection
     */
    public static function getHeroes($from)
    {
        $heroes = static::all()->skip($from)->take(5);
        $result['heroes'] = HeroHelper::setAdditionalParams($heroes);
        $result['isThereMore'] = HeroHelper::isThereMore($from);

        return $result;
    }

    public static function getUpdateHero($heroId)
    {
        $hero = static::where(['id' => $heroId])->first();

        return $hero ? HeroHelper::setHeroParams($hero, true) : 'Hero not found';
    }

    /**
     * @param $id
     */
    public static function deleteHero($id)
    {
        if($id) {
            ImageHelper::deleteHeroStorage($id);
            Power::deleteHeroPowers($id);
            static::where(['id' => $id])->first()->delete();
        }
    }
}

