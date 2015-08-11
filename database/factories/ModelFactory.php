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

$factory->define(App\User::class, function ($faker) {
    return [
<<<<<<< HEAD
        'name' => $faker->userName,
        'email' => $faker->email,
        'password' => str_random(10),
        'group_id' => 'factory:App\Group',
=======
        'username' => $faker->userName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'active' => 1,
        'group_id' => 1, // should be default user group id
>>>>>>> origin/master
    ];
});




