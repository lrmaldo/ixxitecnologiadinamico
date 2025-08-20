<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = fake()->unique()->sentence(5);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => fake()->sentence(20),
            'content' => collect(range(1, 4))->map(fn() => '<p>'.fake()->paragraph().'</p>')->implode(''),
            'featured_image' => 'placeholders/post.jpg',
            'is_published' => true,
            'published_at' => now()->subDays(rand(0, 30)),
            'seo_title' => $title,
            'seo_description' => fake()->sentence(16),
            'type' => fake()->randomElement(['articulo','infografia','caso_exito']),
        ];
    }
}
