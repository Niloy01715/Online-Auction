<?php

namespace App\Http\Controllers;

use App\Models\Bidauction;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class CheckoutController extends Controller
{
    public function checkout()
    {
        // // dd('check');
        $today = Carbon::today();
        $bid_auction = Bidauction::where('user_id',Auth::id())->where('status','win')->whereDate('created_at',$today)->get();
        return view('backend.checkout.index',compact('bid_auction'));
    }
    public function placeorder(Request $request)
    {
        // dd($request->all());
        if($request->payment_mode == 'online-payment')
        {

            $order = new Order();
            $order->user_id = Auth::id();
            $order->product_id = $request->input('product_id');
            $order->bid_amount = $request->input('bid_amount');
            $order->name = $request->input('name');
            $order->email = $request->input('email');
            $order->phone_no = $request->input('phone_no');
            $order->address = $request->input('address');
            $order->country = $request->input('country');
            $order->payment_mode = $request->input('payment_mode');
            $order->tracking_no = "Auction".rand(1111,9999);
            $order->save();
            // Bidauction::where('user_id',Auth::id())->whereDate('created_at', Carbon::today())->delete();
            // return redirect('/example1');
            return back();

        }
        else{
            return back()->with('payment', 'payment method select');
        }


  

        // //To Calulate Total Price
        // $total = 0;
        // $cartitems_total = Cart::where('user_id',Auth::id())->get();
        // foreach($cartitems_total as $prod)
        // {
        //     $total += $prod->rtn_product->selling_price * $prod->product_quantity;
        // }

        // $order->total_price = $total;
        //   //To Calulate Total Price end

      


        // $order_item = Cart::where('user_id',Auth::id())->get();
        // foreach($order_item as $item)
        // {
        //     Orderitem::insert([
        //         'order_id'=>$order->id,
        //         'product_id'=>$item->product_id,
        //         'quantity'=>$item->product_quantity,
        //         'price'=>$item->rtn_product->selling_price,
        //         'created_at'=>Carbon::now(),
        //     ]);
        //     if($order_item){
        //         Cart::where('user_id',Auth::id())->delete();
        //     }
        //     else{
        //         return back();
        //     }

        //     Product::find($item->product_id)->decrement('quantity', $item->product_quantity);
        // }

        // if(Auth::user()->address01 == NULL)
        // {
        //     $user = User::where('id',Auth::id())->first();
        //     $user->lname = $request->input('lname');
        //     $user->phone = $request->input('phone');
        //     $user->address01 = $request->input('address01');
        //     $user->address02 = $request->input('address02');
        //     $user->country = $request->input('country');
        //     $user->state = $request->input('state');
        //     $user->city = $request->input('city');
        //     $user->pincode = $request->input('pincode');
        //     $user->comment = $request->input('comment');
        //     $user->update();
        // }
        // if($request->input('payment_mode') == "Pay with Razarpay")
        // {

        //     return back()->with('status',"Successfully Placed Order by Razarpay");
        //     // return response()->json(['status'=>"Successfully Placed Order by Razarpay"]);


        // }
        // else{
        //     return back()->with('status',"Successfully Placed Order");
        // }


    }
}
