<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DailyData;
use Faker\Generator as Faker;

$factory->define(DailyData::class, function (Faker $faker) {
    return [
        'new_register_count' => $faker->numberBetween(0, 100),
        'first_lottery_count' => $faker->numberBetween(0, 100),
        'all_lottery_count' => $faker->numberBetween(0, 100),
        'jan_code_0' => $faker->numberBetween(0, 100),
        'jan_code_1' => $faker->numberBetween(0, 100),
        'jan_code_2' => $faker->numberBetween(0, 100),
        'jan_code_3' => $faker->numberBetween(0, 100),
        'jan_code_4' => $faker->numberBetween(0, 100),
        'jan_code_5' => $faker->numberBetween(0, 100),
        'jan_code_6' => $faker->numberBetween(0, 100),
        'jan_code_7' => $faker->numberBetween(0, 100),
        'jan_code_8' => $faker->numberBetween(0, 100),
        'jan_code_9' => $faker->numberBetween(0, 100),
        'jan_code_10' => $faker->numberBetween(0, 100),
        'jan_code_11' => $faker->numberBetween(0, 100),
        'jan_code_12' => $faker->numberBetween(0, 100),
        'jan_code_13' => $faker->numberBetween(0, 100),
        'win_count' => $faker->numberBetween(0, 10),
    ];
});
