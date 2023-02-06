<?php

namespace App\Models;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Model;

class ExerciseUser extends Model
{
    protected $table = 't_exercise_users';

    protected $guarded = [
        'id',
    ];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
