<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'P',
            'last_name' => 'Noonan',
            'email' => 'p.e.noonan@gmail.com',
            'password' => 'password'
        ]);
    }
}
