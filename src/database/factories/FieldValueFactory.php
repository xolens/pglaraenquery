<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Xolens\PgLaraenquiry\App\Model\FieldValue;

$factory->define(FieldValue::class, function (Faker $faker) {
    return [
        'section_field_id' => $faker->randomNumber,
        'enquiry_id' => $faker->randomNumber,
        'value' => $faker->name,
    ];
});
