<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 * @package App
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property integer $gender_id
 * @property string $password
 * @property integer $created_at
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'user';
    public $timestamps = false;


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
     * @param $id
     * @return mixed
     */
    public static function deleteUser($id)
    {
        return static::where(['id' => $id])->first()->delete();
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
