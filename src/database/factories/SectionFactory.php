<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Xolens\PgLaraenquiry\App\Model\Section;

$factory->define(Section::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->name,
    ];
});
