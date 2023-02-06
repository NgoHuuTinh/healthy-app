<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'm_foods';
    
    protected $guarded = [
        'id',
    ];
}
