<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'customer',
                'email' => 'customer@gmail.com',
                'password' => \Hash::make('123123123'),
            ],
        ];
        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
