<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'email'         => 'email@email',
            'first_name'    => 'FirstName',
            'last_name'     => 'LastName',
            'password'      => Hash::make('password')
        ]);
    }
}
