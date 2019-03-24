<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Xolens\PgLaraenquiry\App\Model\TableColumn;

$factory->define(TableColumn::class, function (Faker $faker) {
    return [
        'position' => $faker->randomNumber,
        'table_field_id' => $faker->randomNumber,
        'field_id' => $faker->randomNumber,
    ];
});
