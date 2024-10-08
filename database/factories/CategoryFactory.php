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
    protected $model = \App\Models\Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'image' => $this->faker->imageUrl,
            'description' => $this->faker->sentence,
            'parent_id' => null,
        ];
    }
}
