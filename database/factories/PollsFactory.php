<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Poll;
use Faker\Generator as Faker;

$factory->define(Poll::class, function (Faker $faker) {
    return [
        'title' => $faker->company
    ];
});
