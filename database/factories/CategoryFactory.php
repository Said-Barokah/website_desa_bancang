<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence(1,true),
            'slug' => $this->faker->unique()->slug(),
            'keywords' => $this->faker->sentence(5,true),
            'meta_desc' => $this->faker->words(50,true),
        ];
    }
}
