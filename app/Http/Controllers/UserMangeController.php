<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserMangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_manage = User::select(['id','name','email','role','phone_no'])->where('role','buyer')->orWhere('role','seller')->latest()->get();
        return view('backend.usermanage.index',compact('user_manage'));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::find($id);
        $users->delete();
        // Toastr::success('Module deleted Successfully');
        return redirect()->route('user.index');
    }
}
