<?php

use Faker\Generator as Faker;
use App\Models\Link;

$factory->define(Link::class, function (Faker $faker) {
    return [
       'title'=>$faker->name,
       'link'=>$faker->url
    ];
});
