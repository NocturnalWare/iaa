<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('wordpass1'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Profiles\UserProfile::class, function (Faker\Generator $faker) {
	return [
		'user_id' => 0,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'street_1' => $faker->streetAddress,
        'street_2' => '',
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'country' => 'USA',
    ];
});

$factory->define(App\Profiles\Company::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->company,
		'industry' => 'Apparel'
    ];
});

$factory->define(App\Orders\Order::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->catchPhrase,
		'soft_due' => $faker->dateTimeInInterval($startDate = '-20 days', $interval = '+ 90 days', $timezone = date_default_timezone_get()),
		'hard_due' => $faker->dateTimeInInterval($startDate = '-5 days', $interval = '+ 40 days', $timezone = date_default_timezone_get()),
    ];
});
