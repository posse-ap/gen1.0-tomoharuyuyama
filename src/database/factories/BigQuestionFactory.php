<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\BigQuestion::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});