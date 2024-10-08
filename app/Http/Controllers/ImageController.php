<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return Image::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|url',
            'description' => 'nullable|string',
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $image = Image::create($validatedData);

        return response()->json($image, 201);
    }


    public function show($id)
    {
        return Image::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|url',
            'description' => 'nullable|string',
            'product_id' => 'nullable|integer|exists:products,id',
        ]);

        $image = Image::findOrFail($id);

        $image->update($validatedData);

        return response()->json($image, 200);
    }


    public function destroy($id)
    {
        Image::destroy($id);
        return response()->json(null, 204);
    }
}

