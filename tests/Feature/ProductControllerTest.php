<?php

use App\Models\Product;

class ProductControllerTest extends \Tests\TestCase
{
    public function test_can_get_all_products()
    {
        $response = $this->get('/api/products');
        $response->assertStatus(200);
    }

    public function test_can_store_product()
    {
        $data = [
            'name' => 'Test Product',
            'price' => 100
        ];
        $response = $this->post('/api/products', $data);
        $response->assertStatus(201);
    }

    public function test_can_show_product()
    {
        $product = Product::factory()->create();
        $response = $this->get('/api/products/' . $product->id);
        $response->assertStatus(200);
    }

    public function test_can_update_product()
    {
        $product = Product::factory()->create();
        $data = [
            'name' => 'Updated Product Name',
            'price' => 200
        ];
        $response = $this->put('/api/products/' . $product->id, $data);
        $response->assertStatus(200);
    }

    public function test_can_delete_product()
    {
        $product = Product::factory()->create();
        $response = $this->delete('/api/products/' . $product->id);
        $response->assertStatus(204);
    }

    public function test_cannot_store_product_without_required_fields()
    {
        $response = $this->post('/api/products', []);
        $response->assertStatus(422);
    }

    public function test_cannot_show_non_existing_product()
    {
        $response = $this->get('/api/products/9999');
        $response->assertStatus(404);
    }

    public function test_cannot_update_non_existing_product()
    {
        $data = [
            'name' => 'Updated Product Name'
        ];
        $response = $this->put('/api/products/9999', $data);
        $response->assertStatus(404);
    }

    public function test_cannot_delete_non_existing_product()
    {
        $response = $this->delete('/api/products/9999');
        $response->assertStatus(404);
    }

}
