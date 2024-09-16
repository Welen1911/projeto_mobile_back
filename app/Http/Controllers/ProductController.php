<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            if ($request->file('img')->isValid()) {
                $extension = $request->img->extension();

                $path = $request->img->storeAs('images', $request->name.now().$extension);

                $product = Product::create([
                    'name' => $request->name,
                    'price' => $request->price,
                    'image_path' => $path,
                    'category_id' => $request->category_id,
                    'user_id' => $request->user()->id,
                ]);

                return $product;
            }
        } catch (Exception $e) {
            return response($e, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
