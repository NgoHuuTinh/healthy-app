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
        $this->tableName = 't_food_users';
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
            $table->bigInteger('food_id');
            $table->smallInteger('genre_id')->comment('0: snack | 1: breakfast | 2: lunch | 3: dinner');
            $table->date('date');
            $table->decimal('gram', $precision = 7, $scale = 2);
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
