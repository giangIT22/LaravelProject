<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->name;
    $slug = Str::of($name)->slug('-');

    return [
        'name'  => $faker->name,
        'slug'  => $slug,
        'price' => $faker->randomNumber(8),
        'image' => './frontend/images/girl.jpg'
    ];
});
