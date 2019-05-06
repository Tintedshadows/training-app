<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

          'email' => 'test@email.com',
          'username' => 'Cool Guy',
          'fname' => 'Cool',
          'lname' => 'Guy',
          'status' = 'Active',
          'phone' => '920-242-3060',
          'postal' => '54303',
          'confirmedEmail' => '0',
          'status' => 'Active',
          'password' => Hash::make('123'),
          'role' => 'Admin',
          'remember_token'=> str_random(10),
        ]);

        User::create([

          'email' => 'mike.mcgraw@hotmail.com',
          'username' => 'mikemcgraw',
          'fname' => 'mike',
          'lname' => 'mcgraw',
          'phone' => '920-242-3060',
          'postal' => '54303',
          'confirmedEmail' => '0',
          'status' => 'Active',
          'password' => Hash::make('123'),
          'role' => 'Admin',
          'remember_token'=> str_random(10),
        ]);
    }
}
