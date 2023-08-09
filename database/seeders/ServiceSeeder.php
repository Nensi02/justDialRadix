<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) { 
            DB::table('add_services')->insert([
                'sServiceName' => $faker->unique()->jobTitle,
                'sDescription' => $faker->text($maxNbChars = 200),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
