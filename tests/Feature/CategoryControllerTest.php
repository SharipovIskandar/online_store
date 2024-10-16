<?php

use App\Models\Category;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    public function test_can_get_all_categories()
    {
        $response = $this->get('/api/categories');
        $response->assertStatus(200);
    }

    public function test_can_store_category()
    {
        $data = [
            'name' => 'Test Category'
        ];
        $response = $this->post('/api/categories', $data);
        $response->assertStatus(201);
    }

    public function test_can_show_category()
    {
        $category = Category::factory()->create();
        $response = $this->get('/api/categories/' . $category->id);
        $response->assertStatus(200);
    }

    public function test_can_update_category()
    {
        $category = Category::factory()->create();
        $data = [
            'name' => 'Updated Category Name'
        ];
        $response = $this->put('/api/categories/' . $category->id, $data);
        $response->assertStatus(200);
    }

    public function test_can_delete_category()
    {
        $category = Category::factory()->create();
        $response = $this->delete('/api/categories/' . $category->id);
        $response->assertStatus(204);
    }

    public function test_cannot_store_category_without_name()
    {
        $response = $this->post('/api/categories', []);
        $response->assertStatus(422);
    }

    public function test_cannot_show_non_existing_category()
    {
        $response = $this->get('/api/categories/9999');
        $response->assertStatus(404);
    }

    public function test_cannot_update_non_existing_category()
    {
        $data = [
            'name' => 'Updated Category Name'
        ];
        $response = $this->put('/api/categories/9999', $data);
        $response->assertStatus(404);
    }

    public function test_cannot_delete_non_existing_category()
    {
        $response = $this->delete('/api/categories/9999');
        $response->assertStatus(404);
    }


}
