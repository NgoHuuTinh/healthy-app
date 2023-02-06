<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodUser extends Model
{
    protected $table = 't_food_users';
    
    protected $guarded = [
        'id',
    ];
}
