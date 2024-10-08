<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|url',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|integer|exists:categories,id',
        ]);

        $category = Category::create($validatedData);

        return response()->json($category, 201);
    }


    public function show($id)
    {
        return Category::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|url',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|integer|exists:categories,id',
        ]);

        $category = Category::findOrFail($id);

        $category->update($validatedData);

        return response()->json($category, 200);
    }


    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json(null, 204);
    }
}

