<?php

namespace Database\Seeders;

use App\Models\Avatar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $avatars = [
            [
                'image' => file_get_contents(public_path('assets/images/avatar/1.jpg')),
                'title' => 'The Literary Cat',
                'coin' => 50
            ],
            [
                'image' => file_get_contents(public_path('assets/images/avatar/2.jpg')),
                'title' => 'The Top Hat Cat',
                'coin' => 2000
            ],
            [
                'image' => file_get_contents(public_path('assets/images/avatar/3.jpg')),
                'title' => 'The Swing Cat',
                'coin' => 5000
            ],
            [
                'image' => file_get_contents(public_path('assets/images/avatar/4.jpg')),
                'title' => 'The Black Cat',
                'coin' => 10000
            ],
            [
                'image' => file_get_contents(public_path('assets/images/avatar/5.jpg')),
                'title' => 'The Flush Cat',
                'coin' => 20000
            ],
            [
                'image' => file_get_contents(public_path('assets/images/avatar/6.jpg')),
                'title' => 'The Hungry Cat',
                'coin' => 25000
            ],
            [
                'image' => file_get_contents(public_path('assets/images/avatar/7.jpg')),
                'title' => 'The Brush Cat',
                'coin' => 30000
            ],
            [
                'image' => file_get_contents(public_path('assets/images/avatar/8.jpg')),
                'title' => 'The Wet Cat',
                'coin' => 50000
            ],
            [
                'image' => file_get_contents(public_path('assets/images/avatar/9.jpg')),
                'title' => 'The Piano Cat',
                'coin' => 75000
            ],
            [
                'image' => file_get_contents(public_path('assets/images/avatar/10.jpg')),
                'title' => 'The Umbrella Cat',
                'coin' => 90000
            ],
            [
                'image' => file_get_contents(public_path('assets/images/avatar/11.jpg')),
                'title' => 'The Recite Cat',
                'coin' => 95000
            ],
            [
                'image' => file_get_contents(public_path('assets/images/avatar/12.jpg')),
                'title' => 'The Haircut Cat',
                'coin' => 100000
            ]
        ];

        foreach ($avatars as $avatar) {
            Avatar::create($avatar);
        }

        // Avatar::insert($avatars);
    }
}
