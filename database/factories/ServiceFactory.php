<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        $title = fake()->unique()->sentence(3);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'summary' => fake()->sentence(10),
            'description' => fake()->paragraphs(3, true),
            'icon' => '🛡️',
            'image_path' => 'placeholders/service.jpg',
            'is_active' => true,
            'seo_title' => $title,
            'seo_description' => fake()->sentence(12),
            'published_at' => now()->subDays(rand(0, 30)),
        ];
    }
}
