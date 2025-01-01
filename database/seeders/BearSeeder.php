<?php

namespace Database\Seeders;

use App\Models\Bear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = ['brown.jpg', 'panda.jpg', 'polar.jpg'];

        foreach($images as $image) {
            Bear::create([
                'image' => file_get_contents(public_path('assets/images/' . $image))
            ]);
        }
    }
}
