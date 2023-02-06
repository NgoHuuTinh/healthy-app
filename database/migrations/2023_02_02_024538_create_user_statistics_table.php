<?php

use App\Traits\CommonColumn;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    use CommonColumn;

    public function __construct()
    {
        $this->tableName = 't_user_statistics';
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->smallInteger('statistic_type')->comment('0: daily | 1: weekly | 2: month | 3: year');
            $table->date('date');
            $table->decimal('target', $precision = 10, $scale = 2);
            $table->decimal('reality', $precision = 10, $scale = 2);
            $table->decimal('reality_percent', $precision = 7, $scale = 2);
            $this->commonColumns($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
};
