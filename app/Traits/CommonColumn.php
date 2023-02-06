<?php

namespace App\Traits;

use Illuminate\Database\Schema\Blueprint;

trait CommonColumn
{
    protected $tableName = '';

    public function commonColumns(Blueprint $table)
    {
        $table->timestamp('created_at')->useCurrent();
        $table->timestamp('updated_at')->useCurrent();
        $table->softDeletes();
    }
}
