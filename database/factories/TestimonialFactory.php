<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    protected $model = Testimonial::class;

    public function definition(): array
    {
        return [
            'author_name' => fake()->name(),
            'company' => fake()->company(),
            'content' => fake()->sentences(3, true),
            'is_active' => true,
        ];
    }
}
