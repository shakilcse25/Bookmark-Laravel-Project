<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BookmarkModel;
use Faker\Generator as Faker;

$factory->define(BookmarkModel::class, function (Faker $faker) {
    return [
        'title'=> $faker->sentence(3),
        'link'=> $faker->url('foo/bar'),
        'tag'=> $faker->sentence(4),
    ];
});
