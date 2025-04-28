<?php

namespace Database\Seeders;

use App\Models\Home;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Home::updateOrCreate([
            'title' => 'Full Stack Developer',
            'description' => 'I am a programmer who has great interest in field of software development. I have basic skills in several programming languages and keep learning to improve My knowledge and experience in coding and application development. I have a strong desire to contribute to innovative projects and solving problems through technology',
        ]);
    }
}
