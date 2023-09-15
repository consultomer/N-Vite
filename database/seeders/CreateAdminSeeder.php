<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => \Hash::make('123123123'),
            ],
        ];
        foreach ($admins as $key => $value) {
            Admin::create($value);
        }
    }
}
