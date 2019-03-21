<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Xolens\PgLaraenquery\App\Model\ParticipantEnquiry;

$factory->define(ParticipantEnquiry::class, function (Faker $faker) {
    return [
        'participant_id' => $faker->randomNumber,
        'enquiry_id' => $faker->randomNumber,
        'state' => $faker->randomElement($array = ['CREATED', 'UPDATED', 'VALIDATED']),
        'create_time' => $faker->date,
        'update_time' => $faker->date,
        'validation_time' => $faker->date,
    ];
});
