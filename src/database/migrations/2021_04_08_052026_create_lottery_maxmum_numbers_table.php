<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotteryMaxmumNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottery_maxmum_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('pida')->nullable();
            $table->dateTime('max_tries_at');
            $table->integer('max_tries')->default(0);
            $table->string('flag')->nullable();
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
        Schema::dropIfExists('lottery_maxmum_numbers');
    }
}
