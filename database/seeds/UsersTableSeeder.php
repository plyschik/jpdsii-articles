<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = resolve(FakerFactory::class);

        User::create([
            'email'         => 'user1@web.user',
            'first_name'    => $faker->firstName,
            'last_name'     => $faker->lastName,
            'password'      => bcrypt('password'),
            'api_token'     => Str::random(60)
        ])->assignRole('editor');

        User::create([
            'email'         => 'user2@web.user',
            'first_name'    => $faker->firstName,
            'last_name'     => $faker->lastName,
            'password'      => bcrypt('password'),
            'api_token'     => Str::random(60)
        ])->assignRole('administrator');

        User::create([
            'email'         => 'user3@web.user',
            'first_name'    => $faker->firstName,
            'last_name'     => $faker->lastName,
            'password'      => bcrypt('password'),
            'api_token'     => Str::random(60)
        ])->assignRole('editor');

        User::create([
            'email'         => 'user4@web.user',
            'first_name'    => $faker->firstName,
            'last_name'     => $faker->lastName,
            'password'      => bcrypt('password'),
            'api_token'     => Str::random(60)
        ])->assignRole('administrator');
    }
}
