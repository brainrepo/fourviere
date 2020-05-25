<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Episode;
use App\Show;
use Faker\Generator as Faker;

$factory->define(Episode::class, function (Faker $faker) {
    $show = factory(Show::class)->make();
    $show->save();

    return [
        'title' => 'Ep. 21 - Poddok app and laravel',
        'permalink'=> 'http://www.perma.it/sdfds',
        'visibility'=> 'PUBLIC',
        'description'=> $faker->realText(255),
        'explicit'=> true,
        'downloadable'=> true,
        'publish_date'=> $faker->dateTimeBetween('0', '+10 days'),
        'show_id' => $show->id,
    ];
});
