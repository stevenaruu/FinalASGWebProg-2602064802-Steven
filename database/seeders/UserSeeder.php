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
            [
                'username' => 'http://www.instagram.com/stvnism',
                'gender_id' => 1,
                'mobile_number' => '0881025599917',
                'coin' => 99999,
                'password' => bcrypt('Steven123!'),
                'image' => file_get_contents(public_path('assets/images/default.jpg')),
            ],
            [
                'username' => 'http://www.instagram.com/stevenforsythia',
                'gender_id' => 1,
                'mobile_number' => '0881025599918',
                'coin' => 99999,
                'password' => bcrypt('Steven123!'),
                'image' => file_get_contents(public_path('assets/images/default.jpg')),
            ],
            [
                'username' => 'http://www.instagram.com/sforsythia',
                'gender_id' => 2,
                'mobile_number' => '0881025599919',
                'coin' => 99999,
                'password' => bcrypt('Steven123!'),
                'image' => file_get_contents(public_path('assets/images/default.jpg')),
            ],
            [
                'username' => 'http://www.instagram.com/historia',
                'gender_id' => 2,
                'mobile_number' => '0881025599910',
                'coin' => 99999,
                'password' => bcrypt('Steven123!'),
                'image' => file_get_contents(public_path('assets/images/default.jpg')),
            ],
            [
                'username' => 'http://www.instagram.com/apple',
                'gender_id' => 2,
                'mobile_number' => '0123456789',
                'coin' => 99999,
                'password' => bcrypt('Steven123!'),
                'image' => file_get_contents(public_path('assets/images/default.jpg')),
            ],
        ];

        User::insert($user);
    }
}
