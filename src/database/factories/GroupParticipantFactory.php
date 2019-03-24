<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Xolens\PgLaraenquiry\App\Model\GroupParticipant;

$factory->define(GroupParticipant::class, function (Faker $faker) {
    return [
        'group_id' => $faker->randomNumber,
    ];
});
