<?php

namespace Database\Seeders;

use App\Models\Myproject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MyprojectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Myproject::updateOrCreate([
            'description' => 'Ini adalah beberapa proyek yang telah saya selesaikan.',

        ]);
    }
}
