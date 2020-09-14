<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sort;
use App\Model;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'image' => $faker->image('public/storage/uploads/images/product',640,480, null, false),
        'price' => $faker->randomNumber($nbDigits = 3),
        'amount' => $faker->randomNumber($nbDigits = 2),
        // 'sort_id' => function(){
        //     return factory(Sort::class)->create()->id;
        // },
        'sort_id' =>1,
        'description' =>$faker->realText($maxNbChars = 100)
    ];
});


       