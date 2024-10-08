<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Cart;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();

        Category::factory(5)->create();

        Product::factory(20)->create();
        Comment::factory(50)->create();

        Cart::factory(15)->create();
    }
}
