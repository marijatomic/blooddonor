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
        $users = [

            [
                'name' => 'Darivatelj 1',
                'email' => 'darivatelj1@gmail.com',
                'password' => bcrypt('123456'),
                'birth_date' => '1990-10-27',
                'address' => 'Mostar',
                'phone' => '063077442',
                'blod_type' => 'A+',
                'sex' => 'muško',
                'type' => 'darivatelj',
            ],

            [
                'name' => 'Darivatelj 2',
                'email' => 'darivatelj2@gmail.com',
                'password' => bcrypt('123456'),
                'birth_date' => '1990-9-27',
                'address' => 'Sarajevo',
                'phone' => '063077442',
                'blod_type' => 'AB+',
                'sex' => 'žensko',
                'type' => 'darivatelj',
            ],

            [
                'name' => 'Tražitelj 1',
                'email' => 'trazitelj1@gmail.com',
                'password' => bcrypt('123456'),
                'birth_date' => '1990-10-27',
                'address' => 'Mostar',
                'phone' => '063077442',
                'blod_type' => 'A+',
                'sex' => 'muško',
                'type' => 'trazitelj',
            ],

            [
                'name' => 'Tražitelj 2',
                'email' => 'trazitelj2@gmail.com',
                'password' => bcrypt('123456'),
                'birth_date' => '1991-10-27',
                'address' => 'Sarajevo',
                'phone' => '063077442',
                'blod_type' => 'AB+',
                'sex' => 'žensko',
                'type' => 'trazitelj',
            ],

            [
                'name' => 'Transfuziologija',
                'email' => 'transfuziologija@gmail.com',
                'password' => bcrypt('123456'),
                'birth_date' => '1991-10-27',
                'address' => 'Mostar',
                'phone' => '063077442',
                'blod_type' => 'A-',
                'sex' => 'žensko',
                'type' => 'transfuziologija',
            ],

            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'birth_date' => '1991-10-27',
                'address' => 'Mostar',
                'phone' => '063077442',
                'blod_type' => '0-',
                'sex' => 'muško',
                'type' => 'admin',
            ],

        ];

        foreach ($users as $user)
            User::create($user);
    }

}
