<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $data = array(
            [
                'name' => 'Juan Felipe',
                'last_name' => 'Lara',
                'email' => 'juanlara17@gmail.com',
                'user' => 'juanfelo',
                'password' => \Hash::make('123456'),
                'type' => 'admin',
                'active' => '1',
                'address' => 'Cra 71 # 82 - 112',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'Karoll',
                'last_name' => 'Eslait',
                'email' => 'juanlara17@hotmail.com',
                'user' => 'kakos',
                'password' => \Hash::make('123456'),
                'type' => 'user',
                'active' => '1',
                'address' => 'Cra 16D #45E - 23',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        );
        User::insert($data);
    }
}
