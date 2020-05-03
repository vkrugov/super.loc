<?php

namespace App\Helpers;

use App\Hero;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class HeroHelper extends Model
{

    public static function setAdditionalParams(Collection $heroes)
    {
        foreach ($heroes as $hero) {
            $hero = static::setHeroParams($hero);
        }

        return $heroes;
    }

    /**
     * @param $heroId
     * @param bool $stringPowers
     * @return mixed
     */
    public static function getPowerByHero($heroId, $stringPowers = false)
    {
        $powers = Hero::select('power.id', 'power.name', 'power.description')
            ->leftJoin('hero_power', 'hero.id', '=', 'hero_power.hero_id')
            ->leftJoin('power', 'hero_power.power_id', '=', 'power.id')
            ->where('hero_power.hero_id', '=', $heroId)
            ->get();

        if (!$stringPowers) {
           return $powers;
        }

        $stringPower = [];

        foreach ($powers as $power) {
            array_push($stringPower, $power['id']);
        }

        return $stringPower;
    }

    private static function getAvatar($id)
    {
        return ImageHelper::getHeroAvatar($id);
    }

    public static function isThereMore($from)
    {
        $hero = Hero::all()->skip($from + 6)->take(1);

        return count($hero) > 0 ? 1 : 0;
    }

    /**
     * @param $hero
     * @param bool $stringPowers
     * @return mixed
     */
    public static function setHeroParams($hero, $stringPowers = false)
    {
        $hero['powers'] = static::getPowerByHero($hero['id'], $stringPowers);
        $hero['avatar'] = static::getAvatar($hero['id']);
        $hero['created_at'] = date('Y-m-d H:i', $hero['created_at']);
        $hero['updated_at'] = date('Y-m-d H:i', $hero['updated_at']);

        return $hero;
    }
}
