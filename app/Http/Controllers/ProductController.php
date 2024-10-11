<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'comment_id' => 'nullable|integer|exists:comments,id',
        ]);

        $product = Product::create($validatedData);

        return response()->json($product, 201);
    }


    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id' => 'sometimes|integer|exists:categories,id',
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric|min:0',
            'comment_id' => 'sometimes|integer|exists:comments,id',
        ]);

        $product = Product::findOrFail($id);

        $product->update($validatedData);

        return response()->json($product, 200);
    }


    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(null, 204);
    }
    public function getProductsByCategory($category)
    {
        return response()->json([
            $product = Product::query()->where('category_id', $category)->with('category')
        ]);
    }
}
