<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $table = 'm_exercises';

    protected $guarded = [
        'id',
    ];
}
