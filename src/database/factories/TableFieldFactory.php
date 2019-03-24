<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Xolens\PgLaraenquiry\App\Model\TableField;

$factory->define(TableField::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'max_records' => $faker->randomNumber,
        'description' => $faker->name,
        'field_id' => $faker->randomNumber,
    ];
});
