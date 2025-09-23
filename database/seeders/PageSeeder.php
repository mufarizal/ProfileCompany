<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        $pages = [
            ['slug' => 'home', 'title' => 'Home'],
            ['slug' => 'about', 'title' => 'About Us'],
            ['slug' => 'services', 'title' => 'Services'],
            ['slug' => 'contact', 'title' => 'Contact'],
        ];

        foreach ($pages as $page) {
            Page::firstOrCreate(['slug' => $page['slug']], $page);
        }
    }
}
