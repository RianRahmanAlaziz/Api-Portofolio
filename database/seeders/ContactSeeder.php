<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::updateOrCreate([
            'description' => 'Contact me if you have any questionsor just want to say hello.',
            'email' => 'rianrahmanalaziz@gmail.com',
            'github' => 'https://github.com/RianRahmanAlaziz',
            'instagram' => 'https://www.instagram.com/rianrahmanalaziz.zip/',
            'linkedin' => 'https://www.linkedin.com/in/rian-rahman-al-aziz-5186a8302/',
        ]);
    }
}
