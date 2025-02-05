<?php

namespace Database\Seeders;

use App\Models\Hobby;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $hobbies = ['Sleeping', 'Coding', 'Watching videos'];
        $hobbies2 = ['Cooking', 'Dance', 'Drawing'];
        
        foreach($hobbies as $hobby) {
            Hobby::create([
                'user_id' =>'1',
                'hobby' => $hobby     
            ]);
        }

        foreach($hobbies as $hobby) {
            Hobby::create([
                'user_id' =>'2',
                'hobby' => $hobby     
            ]);
        }

        foreach($hobbies as $hobby) {
            Hobby::create([
                'user_id' =>'3',
                'hobby' => $hobby     
            ]);
        }

        foreach($hobbies as $hobby) {
            Hobby::create([
                'user_id' =>'4',
                'hobby' => $hobby     
            ]);
        }

        foreach($hobbies2 as $hobby) {
            Hobby::create([
                'user_id' =>'5',
                'hobby' => $hobby     
            ]);
        }
    }
}
