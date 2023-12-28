<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_datas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->integer('new_register_count')->nullable();
            $table->integer('first_lottery_count')->nullable();
            $table->integer('all_lottery_count')->nullable();
            $table->integer('jan_code_0')->nullable();
            $table->integer('jan_code_1')->nullable();
            $table->integer('jan_code_2')->nullable();
            $table->integer('jan_code_3')->nullable();
            $table->integer('jan_code_4')->nullable();
            $table->integer('jan_code_5')->nullable();
            $table->integer('jan_code_6')->nullable();
            $table->integer('jan_code_7')->nullable();
            $table->integer('jan_code_8')->nullable();
            $table->integer('jan_code_9')->nullable();
            $table->integer('jan_code_10')->nullable();
            $table->integer('jan_code_11')->nullable();
            $table->integer('jan_code_12')->nullable();
            $table->integer('jan_code_13')->nullable();
            $table->integer('win_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_datas');
    }
}
