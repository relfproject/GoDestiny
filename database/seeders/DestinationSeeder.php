<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::create([
            'name' => 'Pantai Lombang',
            'slug' => 'pantai-lombang',
            'location' => 'Sumenep, Madura',
            'description' => 'Pantai indah dengan pohon cemara udang khas Madura.',
            'image' => 'pantai-lombang.jpg',
        ]);

        Destination::create([
            'name' => 'Bukit Jaddih',
            'slug' => 'bukit-jaddih',
            'location' => 'Bangkalan, Madura',
            'description' => 'Bukit kapur putih dengan pemandangan unik.',
            'image' => 'bukit-jaddih.jpg',
        ]);

        Destination::create([
            'name' => 'Air Terjun Toroan',
            'slug' => 'air-terjun-toroan',
            'location' => 'Sampang, Madura',
            'description' => 'Air terjun langsung ke laut, salah satu destinasi unik di Madura.',
            'image' => 'air-terjun-toroan.jpg',
        ]);
    }
}
