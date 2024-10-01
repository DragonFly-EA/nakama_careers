<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                'firstname' => 'Nelson',
                'lastname' => 'Sammy',
                'email' => 'nelson@dragonfly.africa',
                'password'=>Hash::make('secret'),
                'profile'=>'https://icons.veryicon.com/png/o/miscellaneous/two-color-icon-library/user-286.png',
            ]
        ];
        User::insert($users);
    }
}
