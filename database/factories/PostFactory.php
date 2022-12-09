<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\Author;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'body' => $faker->paragraph,
        'author_id' => function () {
            return factory(Author::class)->create()->id;
        }
        ];
});
