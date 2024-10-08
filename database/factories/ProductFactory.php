<?php

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 1000), // Random narx
            'category_id' => Category::factory(),
            'comment_id' => Comment::factory()->nullable(),
        ];
    }
}
