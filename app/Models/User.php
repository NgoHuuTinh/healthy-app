<?php

namespace App\Models;

use App\Models\FoodUser;
use App\Models\DiaryUser;
use App\Models\ExerciseUser;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    protected $table = 'm_users';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $guarded = [
        'id',
    ];

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

    public function userStatistics()
    {
        return $this->hasMany(UserStatistic::class);
    }

    public function userStatisticToday()
    {
        return $this->hasMany(UserStatistic::class);
    }

    public function foodUsers()
    {
        return $this->hasMany(FoodUser::class);
    }

    public function exerciseUsers()
    {
        return $this->hasMany(ExerciseUser::class);
    }

    public function diaryUsers()
    {
        return $this->hasMany(DiaryUser::class);
    }
}
