<?php

namespace Database\Seeders;

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
        $users = User::factory(10)->create();

        $categories = Category::factory(5)->create();

        $products = Product::factory(20)
            ->has(Comment::factory()->count(3), 'comments') // Har bir mahsulotga 3 ta izoh berish
            ->create();

        Cart::factory(15)->create();
    }
}
