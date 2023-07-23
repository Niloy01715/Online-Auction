<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function storetocart(Request $request)
    {
        // dd($request->all());
        Cart::insert([
            'user_id'=>Auth::id(),
            'bidauction_id'=>$request->bidauction_id,
            'product_id'=>$request->product_id,
            'created_at'=>Carbon::now()
        ]);

        return back();
    }
}
