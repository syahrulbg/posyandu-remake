<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = [
            [
                'role_id' => 1,
                'ibu_id' => 'petugas',
                'email' => 'petugas@gmail.com',
                'password' => bcrypt('petugas2022'),
            ]
            ];
            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
