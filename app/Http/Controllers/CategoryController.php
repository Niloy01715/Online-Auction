<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = Category::select(['id','name','status'])->latest()->get();
        return view('backend.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::updateOrCreate([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);
        // Toastr::success('Module Created Successfully');
        return redirect()->route('category.index');
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
        $category = Category::find($id);
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $category = Category::find($id);
        $category->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);

        // Toastr::success('Module updated Successfully');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        // Toastr::success('Module deleted Successfully');
        return redirect()->route('category.index');

    }

    
}
