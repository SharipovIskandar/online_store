<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    protected $model = \App\Models\Comment::class;

    public function definition()
    {
        return [
            'author' => $this->faker->name,
            'user_id' => User::factory(),
            'product_id' => Product::factory(), // Bu o'zaro bog'lanish, shuni yodda tuting
        ];
    }
}
