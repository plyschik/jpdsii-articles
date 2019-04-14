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
            'email'         => 'editor@articles.paw',
            'first_name'    => $faker->firstName,
            'last_name'     => $faker->lastName,
            'password'      => bcrypt('password'),
            'api_token'     => Str::random(60)
        ])->assignRole('editor');

        User::create([
            'email'         => 'administrator@articles.paw',
            'first_name'    => $faker->firstName,
            'last_name'     => $faker->lastName,
            'password'      => bcrypt('password'),
            'api_token'     => Str::random(60)
        ])->assignRole('administrator');

        User::create([
            'email'         => 'editor2@articles.paw',
            'first_name'    => $faker->firstName,
            'last_name'     => $faker->lastName,
            'password'      => bcrypt('password'),
            'api_token'     => Str::random(60)
        ])->assignRole('editor');

        User::create([
            'email'         => 'administrator2@articles.paw',
            'first_name'    => $faker->firstName,
            'last_name'     => $faker->lastName,
            'password'      => bcrypt('password'),
            'api_token'     => Str::random(60)
        ])->assignRole('administrator');
    }
}
