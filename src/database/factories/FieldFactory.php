<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Xolens\PgLaraenquiry\App\Model\Field;

$factory->define(Field::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'type' => $faker->randomElement($array = ['CHECKBOX', 'COMBOBOX', 'DATEPICKER', 'NUMBERFIELD', 'RADIOGROUP', 'SPINNER', 'TABLE', 'TEXTFIELD', 'TEXTAREA', 'TIMEFIELD']),
        'display_text' => $faker->name,
        'required' => $faker->randomElement($array = [true, false]),
        'value_list' => '{}',
        'description' => $faker->name,
    ];
});
