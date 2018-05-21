<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        User::create([
            'email'         => 'user1@web.user',
            'first_name'    => $faker->firstName,
            'last_name'     => $faker->lastName,
            'password'      => bcrypt('password')
        ])->assignRole('editor');

        User::create([
            'email'         => 'user2@web.user',
            'first_name'    => $faker->firstName,
            'last_name'     => $faker->lastName,
            'password'      => bcrypt('password')
        ])->assignRole('administrator');

        User::create([
            'email'         => 'user3@web.user',
            'first_name'    => $faker->firstName,
            'last_name'     => $faker->lastName,
            'password'      => bcrypt('password')
        ])->assignRole('editor');

        User::create([
            'email'         => 'user4@web.user',
            'first_name'    => $faker->firstName,
            'last_name'     => $faker->lastName,
            'password'      => bcrypt('password')
        ])->assignRole('administrator');
    }
}
