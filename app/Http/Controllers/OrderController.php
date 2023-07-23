<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function userorder()
    {
        $today = Carbon::today();
        $order_info = Order::where('user_id',Auth::id())->whereDate('created_at',$today)->get();
        return view('backend.order.order',compact('order_info'));
    }
    public function order()
    {
        $order_info = Order::all();
        return view('backend.order.allorder',compact('order_info'));
    }
    public function orderstatus(Request $request)
    {
        Order::find($request->id)->update([
            'status'=>$request->status
        ]);
        return back();
    }
}
