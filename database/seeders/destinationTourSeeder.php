<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class destinationTourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('destination_tour')->insert([
            ['tour_id' => 1, 'destination_id' => 1], 
            ['tour_id' => 1, 'destination_id' => 2], 
            ['tour_id' => 1, 'destination_id' => 3], 
            ['tour_id' => 1, 'destination_id' => 4], 
            ['tour_id' => 1, 'destination_id' => 5], 
            ['tour_id' => 1, 'destination_id' => 6], 
            ['tour_id' => 1, 'destination_id' => 7], 
            ['tour_id' => 1, 'destination_id' => 8], 
            ['tour_id' => 1, 'destination_id' => 9], 
            ['tour_id' => 1, 'destination_id' => 10], 
            ['tour_id' => 2, 'destination_id' => 11], 
            ['tour_id' => 2, 'destination_id' => 12], 
            ['tour_id' => 2, 'destination_id' => 13], 
            ['tour_id' => 2, 'destination_id' => 14], 
            ['tour_id' => 2, 'destination_id' => 15], 
            ['tour_id' => 2, 'destination_id' => 16], 
            ['tour_id' => 2, 'destination_id' => 20], 
            ['tour_id' => 3, 'destination_id' => 3], 
            ['tour_id' => 3, 'destination_id' => 23], 
            ['tour_id' => 4, 'destination_id' => 2], 
            ['tour_id' => 4, 'destination_id' => 21],
        ]);
    }
}
