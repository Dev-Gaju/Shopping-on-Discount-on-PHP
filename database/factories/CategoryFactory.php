<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Category::class, function (Faker $faker) {
    return [
       'category_name' =>$faker->word,
        'category_description'=>$faker->text(),
        'publication_status' => $faker->boolean(),
    ];
});
