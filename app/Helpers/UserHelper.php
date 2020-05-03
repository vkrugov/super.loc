<?php

namespace App\Helpers;

use App\Enums\GenderEnum;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserHelper
{
    /**
     * @param Authenticatable $user
     * @return array
     */
    public static function getInfo(Authenticatable $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'gender' => GenderEnum::toSelectArray()[$user->gender_id] ?? null,
            'created_at' => $user->created_at,
        ];
    }
}
