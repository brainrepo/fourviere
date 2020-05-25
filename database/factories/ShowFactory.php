<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Show;
use Faker\Generator as Faker;

$factory->define(Show::class, function (Faker $faker) {
    return [
        'title' => 'Gitbar',
        'subtitle' => 'Italian developer podcast',
        'summary' => $faker->realText(300),
        'language' => 'it',
        'category' => 'Technology',
        'itunes_category' => ['Tech News'],
        'copyright' => 'Brainrepo 2020',
        'owner' => 'Brainrepo',
        'email' => 'info@gitbar.it',
        'author' => 'Brainrepo',
        'explicit' => false,
    ];
});
