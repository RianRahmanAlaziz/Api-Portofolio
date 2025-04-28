<?php

namespace Database\Seeders;

use App\Models\Aboutme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutmeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aboutme::updateOrCreate([
            'description' => 'A brief introduction about me and my interest.',
        ]);
    }
}
