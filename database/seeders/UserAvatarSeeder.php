<?php

namespace Database\Seeders;

use App\Models\UserAvatar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user_avatars = [
            [
                'user_id' => 1,
                'avatar_id' => 1,
                'status' => 'Saved',
            ],
            [
                'user_id' => 1,
                'avatar_id' => 2,
                'status' => 'Saved',
            ],
            [
                'user_id' => 1,
                'avatar_id' => 3,
                'status' => 'Pending',
            ]
        ];

        UserAvatar::insert($user_avatars);
    }
}
