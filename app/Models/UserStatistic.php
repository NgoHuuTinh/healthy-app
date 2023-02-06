<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStatistic extends Model
{
    protected $table = 't_user_statistics';

    protected $guarded = [
        'id',
    ];

    public function getStatisticNameAttribute()
    {
        if ($this->statistic_type == 0) {
            return 'daily';
        } elseif ($this->statistic_type == 1) {
            return 'weekly';
        } elseif ($this->statistic_type == 2) {
            return 'monthly';
        } else {
            return 'yearly';
        }
    }
}
