<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    public $table = 'power';

    /**
     * @return Power[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getPowers()
    {
        return static::all();
    }

    /**
     * @param $heroId
     * @param array $powers
     */
    public static function saveHeroPowers($heroId, array $powers)
    {
        foreach ($powers as $power) {
            DB::table('hero_power')->insertOrIgnore([
                [
                    'hero_id' => $heroId,
                    'power_id' => $power,
                ],
            ]);
        }
    }

    /**
     * @param $id
     */
    public static function deleteHeroPowers($id)
    {
        DB::table('hero_power')->where([
            'hero_id' => $id
        ])->delete();
    }
}
