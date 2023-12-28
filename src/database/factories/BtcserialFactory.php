<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BtcSerial;
use Faker\Generator as Faker;

$factory->define(BtcSerial::class, function (Faker $faker) {
    return [
        'user_id' => '1',
        'btc_serial' => $faker->unique()->ean8,
    ];
});
