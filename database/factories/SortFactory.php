<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Sort;
use Faker\Generator as Faker;

$factory->define(Sort::class, function (Faker $faker) {
    return [
        'title'=>'Man',
        'subtitle'=>'Man clothes',
        'solgan'=>'Best Sale Ever',
        'image'=>'/storage/uploads/images/sort/_1596443593_F18kGVTsnL.jpg'
    ];
});
