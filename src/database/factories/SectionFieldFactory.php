<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Xolens\PgLaraenquiry\App\Model\SectionField;

$factory->define(SectionField::class, function (Faker $faker) {
    return [
        'position' => $faker->randomNumber,
        'field_id' => $faker->randomNumber,
        'section_id' => $faker->randomNumber,
    ];
});
