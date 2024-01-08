<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $user_id=$request->user()->id;
        $products=Product::where('user_id',$user_id)->get();
        return response($products,201);
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
        $request->validate([
           'title'=>'required|max:255',
           'description'=>'required|max:255',
        ]);
        Product::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>$request->user()->id,
        ]);

        return response([
           'message'=>'product created successfully'
        ]);
    }
    public function show($id)
    {
        $product=Product::findOrFail($id);
        return response($product,201);
    }
    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {
        $product=Product::findOrFail($id);
        $product->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>$request->user()->id
        ]);

        return response([
            'message'=>'Product updated sucessfully'
        ],201);
    }
    public function destroy(Product $product)
    {
        $product->delete();

        return response([
            'message'=>'Product deleted sucessfully'
        ],201);
    }
}
