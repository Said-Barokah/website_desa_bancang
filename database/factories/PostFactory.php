<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->randomElement([1,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17]),
            'user_id' => $this->faker->randomElement([1,2,3,4,5]),
            'cover' => $this->faker->randomElement(['/storage/images/blog/2u2ayHxh0V3r1ka8zDWW2K7VxRolIZaPgYTvb8Ym.png', '/storage/images/blog/czfP9b5NfnSyDblXenziLnNwJeBUCBbUW1wFRYNG.png', '/storage/images/blog/Qv6wqjF2dKXUJNlFqWslGrXIwUPXuuex9lQ5oheV.png']),
            'title' => $this->faker->unique()->sentence(6,true),
            'slug' => $this->faker->unique()->slug(),
            'desc' => $this->faker->words(500,true),
            'meta_desc' => $this->faker->words(50,true),
            'keywords' => $this->faker->sentence(3,true),

        ];
    }
}
