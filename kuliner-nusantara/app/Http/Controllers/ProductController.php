<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::All();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$product = new Product();
		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->imagefile = $request->input('imagefile');
		$product->category_id = $request->input('category_id');
		$product->price = $request->input('price');
		$product->qty_stock = $request->input('qty_stock');
		$product->imagefile = $request->input('imagefile');
		$product->is_halal = $request->input('is_halal');
		$product->is_active = $request->input('is_active');
		$product->save();
		
		$resp = $product;
		$resp->message = "Success";

		return response()->json($resp, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id)
    {
        return $product->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $prod = $product->find($id);
		$prod->name = $request->input('name');
		$prod->description = $request->input('description');
		$prod->imagefile = $request->input('imagefile');
		$prod->category_id = $request->input('category_id');
		$prod->price = $request->input('price');
		$prod->qty_stock = $request->input('qty_stock');
		$prod->imagefile = $request->input('imagefile');
		$prod->is_halal = $request->input('is_halal');
		$prod->is_active = $request->input('is_active');
		$prod->save();
		
		$resp = $prod;
		$resp->message = "Success";

		return response()->json($resp, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $product->find($id)->delete();
        return response('Deleted', 204);
    }
}
