<?php

use Faker\Generator as Faker;

//$factory->define(Model::class, function (Faker $faker) {
//    return [
//        //
//    ];
//});
$factory->define(App\Author::class, function (Faker $faker) {
    $gender = ['Male', 'Female', 'Other'];
    return [
        'name' => $faker->name,
        'gender' => $gender[array_rand($gender,1)],
        'dob' => $faker->date(),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime()
    ];
});