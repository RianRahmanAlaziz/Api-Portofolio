<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::updateOrCreate([
            'description' => "Explore some skills I'm proficient in to deliver high-quality solutions",
            'web' => 'Active',
            'api' => 'Active',
            'machine' => 'Active',
            'mobile' => 'Active',
            'tools' => '["sfsfsf"]',
            'framework' => '["sfsfsf"]'
        ]);
    }
}
