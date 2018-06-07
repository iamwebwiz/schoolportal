<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Student::class, function (Faker $faker){
    $gender = $faker->randomElement(['male', 'female']);
    return [
    'fullName'=>$faker->name,
    'gender'=>$gender,
    'dateOfBirth'=>$faker->date($format='Y-m-d', $max = 'now'),
    'admissionDate'=>$faker->date($format='Y-m-d', $max = 'now'),
    'peculiarities'=>$faker->realText(),
    ];
});

$factory->define(App\Sponsor::class, function(Faker $faker){
    $gender = $faker->randomElement(['male', 'female']);
    return [
    'title'=>$faker->title($gender),
    'fullName'=>$faker->name,
    'address'=>$faker->address,
    'email'=>$faker->unique()->safeEmail,
    'occupation'=>$faker->jobTitle,
    'phone'=>$faker->phoneNumber,
    ];

});

$factory->define(App\Staff::class, function(Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    return [
    'title'=>$faker->title($gender),
    'fullName'=>$faker->name,
    'gender'=>$gender,
    'address'=>$faker->address,
    'email'=>$faker->unique()->safeEmail,
    'dateOfBirth'=>$faker->date($format='Y-m-d', $max = 'now'),
    'dateOfEmployment'=>$faker->date($format='Y-m-d', $max = 'now'),
    'qualifications'=>$faker->realText,
    'phone'=>$faker->phoneNumber,
    ];
});


