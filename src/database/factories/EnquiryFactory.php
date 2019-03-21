<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Xolens\PgLaraenquery\App\Model\Enquiry;

$factory->define(Enquiry::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'title' => $faker->name,
        'description' => $faker->name,
        'group_id' => $faker->randomNumber,
        'form_id' => $faker->randomNumber,
    ];
});