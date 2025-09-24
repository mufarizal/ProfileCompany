<?php

namespace Database\Seeders;

use App\Models\ServicePage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
    {
        ServicePage::create([
            'title' => 'Our Services',
            'description' => 'Kami menyediakan layanan terbaik untuk kebutuhan bisnis Anda.',
            'icon' => null,
            'banner_title' => 'Explore Our Services',
            'banner_subtitle' => 'Solutions that grow your business',
            'banner_image' => null,
            'name' => null,
            'email' => null,
            'message' => null,
        ]);
    }
}
