<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Service::factory()->count(6)->create();
        \App\Models\Post::factory()->count(9)->create();
        \App\Models\Testimonial::factory()->count(6)->create();
        \App\Models\GalleryItem::factory()->count(8)->create();
    // Clientes y Tickets demo
    \App\Models\Cliente::factory()->count(12)->create();
    \App\Models\Ticket::factory()->count(20)->create();
    }
}
