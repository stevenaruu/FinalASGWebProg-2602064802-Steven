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
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'avatar_id' => 2,
                'status' => 'Saved',
                'created_at' => now()->addSeconds(5), // 5 seconds delay
            ],
            [
                'user_id' => 1,
                'avatar_id' => 3,
                'status' => 'Pending',
                'created_at' => now()->addSeconds(10), // 10 seconds delay
            ],
            [
                'user_id' => 2,
                'avatar_id' => 1,
                'status' => 'Saved',
                'created_at' => now()->addSeconds(15), // 5 seconds delay
            ]
        ];

        UserAvatar::insert($user_avatars);
    }
}
