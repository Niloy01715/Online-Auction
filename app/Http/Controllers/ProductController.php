<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
// use Intervention\Image\Facades\Image as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::select(['id','product_name','product_image','price','status'])->latest()->get();
        return view('backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorys = Category::select(['id','name'])->get();
        return view('backend.product.create',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = new Product;
        $products->category_id = $request->input('category_id');
        $products->product_name = $request->input('product_name');
        $products->price = $request->input('price');
        $products->status = $request->input('status');
        if($request->hasFile('product_image'))
        {
            $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/product/',$filename);
            $products->product_image = $filename;
        }
        $products->save();
        return redirect()->route('product.index');        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categorys = Category::select(['id','name'])->get();
        return view('backend.product.edit',compact('product','categorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->category_id = $request->input('category_id');
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->status = $request->input('status');
        if($request->hasFile('product_image'))
        {
            $destination = 'uploads/product/'.$product->product_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('product_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/product/',$filename);
            $product->product_image = $filename;
        }
        $product->update();
        return redirect()->route('product.index');
    


    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Product::find($id);
        $old_image = $image->product_image;
        $delete_path = public_path() . '/uploads/product/'.$old_image;
        unlink($delete_path);
        Product::find($id)->delete();
        return redirect()->route('product.index');
    }
}
