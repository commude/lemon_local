<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Stamp;
use App\Models\User;
use App\Models\Card;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Stamp::class, function (Faker $faker) {
    return [
        'user_id' => User::inRandomOrder()->first()->id,
        'card_id' => Card::inRandomOrder()->first()->id,
        'stamp_type' => $faker->numberBetween(1, 14),
    ];
});
