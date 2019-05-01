<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
   return [
      'title' => $faker->city,
      'question' => $faker->address,
      'poll_id' => factory(\App\Poll::class)->create()
   ];
});
