<?php

namespace Database\Factories;

use App\Models\GalleryItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryItemFactory extends Factory
{
    protected $model = GalleryItem::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'image_path' => 'placeholders/sample.jpg',
            'is_active' => true,
        ];
    }
}
