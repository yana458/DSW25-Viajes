<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tour::create(['name' => "Capitales europeas"]);
        Tour::create(['name' => 'Lo mejor de Tenerife']);
        Tour::create(['name' => "Italia maravillosa"]);
        Tour::create(['name' => "Francia mágica"]);
    }
}
