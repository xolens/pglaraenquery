<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Xolens\PgLaraenquery\App\Model\FormSection;

$factory->define(FormSection::class, function (Faker $faker) {
    return [
        'position' => $faker->randomNumber,
        'section_id' => $faker->randomNumber,
        'form_id' => $faker->randomNumber,
    ];
});
