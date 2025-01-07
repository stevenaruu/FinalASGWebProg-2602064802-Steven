<?php

namespace Database\Seeders;

use App\Models\Chat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stvnism = [
            'sender_id' => '1',
            'recipient_id' => '5',
            'message' => 'Hello',
            'created_at' => now(),
        ];

        $apple = [
            'sender_id' => '5',
            'recipient_id' => '1',
            'message' => 'Just hello????',
            'created_at' => now()->addSeconds(5), // 5 seconds delay
        ];

        $stvnism2 = [
            'sender_id' => '1',
            'recipient_id' => '5',
            'message' => 'hehe sowwryy',
            'created_at' => now()->addSeconds(10), // 10 seconds delay
        ];

        $steven = [
            'sender_id' => '2',
            'recipient_id' => '5',
            'message' => 'hallooowwww apple!!',
            'created_at' => now()->addSeconds(15), // 5 seconds delay
        ];

        Chat::create($stvnism);
        Chat::create($apple);
        Chat::create($stvnism2);
        Chat::create($steven);
    }
}
