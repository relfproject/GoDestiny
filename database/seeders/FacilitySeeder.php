<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    public function run()
    {
        $facilities = ['Parkir', 'Toilet', 'Penginapan', 'Warung Makan', 'Pusat Oleh-oleh'];
        foreach ($facilities as $f) {
            Facility::create(['name' => $f]);
        }
    }
}

