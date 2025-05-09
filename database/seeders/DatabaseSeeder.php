<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategorySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(HomeSeeder::class);
        $this->call(AboutmeSeeder::class);
        $this->call(MyprojectSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(AboutSeeder::class);
    }
}
