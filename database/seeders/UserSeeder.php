<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = [
            'username' => 'http://www.instagram.com/stvnism',
            'gender_id' => 1,
            'mobile_number' => '0881025599917',
            'coin' => 99999,
            'password' => bcrypt('Steven123!'),
            'image' => file_get_contents(public_path('assets/images/default.jpg')),
        ];

        User::create($user);
    }
}
