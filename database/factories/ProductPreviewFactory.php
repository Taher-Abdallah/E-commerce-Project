<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductPreview>
 */
class ProductPreviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment' => $this->faker->sentence(),
            'product_id' => \App\Models\Product::inRandomOrder()->first()->id,
            'user_id' => \App\Models\User::inRandomOrder()->first()->id
        ];
    }
}
