<?php

use App\Models\GivingCircle;
use App\User;
use Illuminate\Database\Seeder;

class GivingCircleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $circle = GivingCircle::create([
            'name' => 'First Circle'
        ]);

        $user = User::find(1);
        $circle->users()->save($user, ['user_role' => GivingCircle::$roles['owner']]);
    }
}
