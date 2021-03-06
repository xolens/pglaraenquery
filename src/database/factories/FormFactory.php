<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Xolens\PgLaraenquiry\App\Model\Form;

$factory->define(Form::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->name,
        'primary_section_id' => $faker->randomNumber,
    ];
});
