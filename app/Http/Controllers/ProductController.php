<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        if ($request->has('name')) {
            $products->where('name', $request->nome);
        }
        return $products;
    }

    public function create()
    {
        return view('products.create');
    }

    public function edit(int $id, Request $request)
    {
        return response()
        ->json(Product::update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]), 
        201);
    }

    public function store(Request $request)
    {
        return response()
        ->json(Series::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]), 
        201);
    }
    

    public function show(int $id)
    {
        $product = Product::find($id);

        return $product;
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);

        $product->update(
            [
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description
            ]
        );
        return response()->json($id);
    }

    public function destroy($id)
    {
        $product = Product::destroy($id);
        return response()->noContent();
    }
}
