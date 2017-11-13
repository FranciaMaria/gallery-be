<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Gallery::class, function (Faker $faker) {
    return [
        'name' => $faker->sentences(1, true),
        'description' => $faker->text(100)
    ];
});

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'url' => $faker->imageUrl($width = 318, $height = 180)
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'text' => $faker->text(50),
        'author_id' => rand(1,5)
    ];
});