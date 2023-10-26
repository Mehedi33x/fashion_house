<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' =>Str::random(10),
            'name'=>fake()->name(),
            'category_id' => fake()->numberBetween(14,18),
            // 'category_id' => fake()->randomElements('14','15','16'),
            'price' => fake()->numberBetween(200,1000),
            'stock' => fake()->numberBetween(1,100),
            'description' =>fake()->text('20'),
            'status' => fake()->randomElement(['active','inactive']),
        ];
    }
}
