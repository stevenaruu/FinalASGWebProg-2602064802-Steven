<?php

namespace Database\Seeders;

use App\Models\Friend;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $friends = [
            [
                'user_id' => '1',
                'friend_id' => '2',
                'status' => 'Friend'
            ],
            [
                'user_id' => '2',
                'friend_id' => '1',
                'status' => 'Friend'
            ],
            [
                'user_id' => '1',
                'friend_id' => '3',
                'status' => 'Sent'
            ],
            [
                'user_id' => '3',
                'friend_id' => '1',
                'status' => 'Friend Request'
            ],
            [
                'user_id' => '1',
                'friend_id' => '5',
                'status' => 'Friend'
            ],
            [
                'user_id' => '5',
                'friend_id' => '1',
                'status' => 'Friend'
            ],
        ];

        Friend::insert($friends);
    }
}
