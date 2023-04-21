<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventsSeeder extends Seeder
{
  
    public function run(): void
    {
        $faker = Faker::create(); 

        $randomLocation = ['España', 'Portugal', 'Madrid'];

        for ($i = 11; $i <= 100; $i++) {
            DB::table('events')->insert([
                'title' => $faker->sentence(),
                'description' => $faker->paragraph(),
                'location' => $faker->randomElement($randomLocation), 
                'date' => $faker->dateTime(),
                'user_id' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

    }
}
}

