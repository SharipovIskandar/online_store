<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return Cart::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'product_id' => 'required|integer|exists:products,id',
            'count' => 'required|integer|min:1',
        ]);

        $cart = Cart::create($validatedData);

        return response()->json($cart, 201);
    }


    public function show($id)
    {
        return Cart::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'sometimes|integer|exists:users,id',
            'product_id' => 'sometimes|integer|exists:products,id',
            'count' => 'sometimes|integer|min:1',
        ]);

        $cart = Cart::findOrFail($id);

        $cart->update($validatedData);

        return response()->json($cart, 200);
    }


    public function destroy($id)
    {
        Cart::destroy($id);
        return response()->json(null, 204);
    }
}

