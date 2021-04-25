<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $users= array(
            [
                'name'=>"hamilton",
                'email'=>"diaz3220@hotmail.com",
                'password'=>\Hash::make("123456789")
            ],
            [
                'name'=>"lisseth",
                'email'=>"liyafi1210@hotmail.com",
                'password'=>\Hash::make("123456789")
            ],
        );

        foreach ($users as $user) {
            User::updateOrCreate($user);
        }
    }
}
