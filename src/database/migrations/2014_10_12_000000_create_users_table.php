<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('tonariwa_id');
            $table->string('mypage_id')->nullable();
            $table->integer('teiban_flag')->default(0);
            $table->integer('otokomae_flag')->default(0);
            $table->integer('oitashi_flag')->default(0);
            $table->integer('shio_flag')->default(0);
            $table->integer('winning_rate')->default(0);
            $table->rememberToken();
            $table->timestamps();

            // Index を貼る
            $table->index(['tonariwa_id', 'mypage_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
