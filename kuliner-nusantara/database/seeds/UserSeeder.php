<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User;
        $user->name = "test";
        $user->email = "test@kulinernusantara.com";
        $user->password = Hash::make("password");
        $user->api_token = str_random(80);
        $user->save();
    }
}
