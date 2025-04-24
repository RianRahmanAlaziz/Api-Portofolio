<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Category::updateOrCreate(
            [
                'name' => 'Web Development'
            ],
            [
                'name' => 'Web Development',
            ]
        );
        Category::updateOrCreate(
            [
                'name' => 'Landing Page'
            ],
            [
                'name' => 'Landing Page',
            ]
        );
        Category::updateOrCreate(
            [
                'name' => 'Android'
            ],
            [
                'name' => 'Android',
            ]
        );
    }
}
