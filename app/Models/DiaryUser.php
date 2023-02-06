<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaryUser extends Model
{
    protected $table = 't_diary_users';
    
    protected $guarded = [
        'id',
    ];
}
