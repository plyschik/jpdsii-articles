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
        User::create([
            'email'         => 'p.smith@mx.net',
            'first_name'    => 'Peter',
            'last_name'     => 'Smith',
            'password'      => bcrypt('password')
        ])->assignRole('editor');

        User::create([
            'email'         => 'j.taylor@mx.net',
            'first_name'    => 'John',
            'last_name'     => 'Taylor',
            'password'      => bcrypt('password')
        ])->assignRole('administrator');
    }
}
