<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Models\BlogPost::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3, 8), true);
    $txt = $faker->realText(rand(1000, 4000));
    $isPublished = rand(1, 5) > 1;
    $createdAt = $faker->dateTimeBetween('-3 month', '-1 days');

    $data = [
        'category_id' => rand (1, 11),
        'user_id' => 2,
        'title' => $title,
        'slug' => Str::slug($title),
        'excert' => $faker->text(rand(40, 100)),
        'content_raw' => $txt,
        'content_html' => $txt,
        'is_published' => $isPublished,
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
        'published_at' => $isPublished ? $faker->dateTimeBetween('-2 month', '-1 days') : null,
    ];
    return $data;
});
