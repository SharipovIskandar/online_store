<?php

namespace Tests\Feature;

use App\Models\Cart;
use Tests\TestCase;

class CartControllerTest extends TestCase
{

    public function test_can_get_all_carts()
    {
        $response = $this->get('/api/carts');
        $response->assertStatus(200);
    }

    public function test_can_store_cart()
    {
        $data = [
            'name' => 'Test Cart',
            'user_id' => 1
        ];
        $response = $this->post('/api/carts', $data);
        $response->assertStatus(201);
    }

    public function test_can_show_cart()
    {
        $cart = Cart::factory()->create();
        $response = $this->get('/api/carts/' . $cart->id);
        $response->assertStatus(200);
    }

    public function test_can_update_cart()
    {
        $cart = Cart::factory()->create();
        $data = [
            'name' => 'Updated Cart Name'
        ];
        $response = $this->put('/api/carts/' . $cart->id, $data);
        $response->assertStatus(200);
    }

    public function test_can_delete_cart()
    {
        $cart = Cart::factory()->create();
        $response = $this->delete('/api/carts/' . $cart->id);
        $response->assertStatus(204);
    }
    public function test_cannot_store_cart_without_required_fields()
    {
        $response = $this->post('/api/carts', []);
        $response->assertStatus(422);
    }

    public function test_cannot_show_non_existing_cart()
    {
        $response = $this->get('/api/carts/9999');
        $response->assertStatus(404);
    }

    public function test_cannot_update_non_existing_cart()
    {
        $data = [
            'name' => 'Updated Cart Name'
        ];
        $response = $this->put('/api/carts/9999', $data);
        $response->assertStatus(404);
    }

    public function test_cannot_delete_non_existing_cart()
    {
        $response = $this->delete('/api/carts/9999');
        $response->assertStatus(404);
    }


}
