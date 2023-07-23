<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Bidauction;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    public function index()
    {

        $bidsitems = Auction::select("*")
                ->whereDate('live_auction_date', Carbon::today())
                ->get();
        // dd($bidsitems);
        // $product = Product::select(['id','product_name','product_image','price'])->get();
        return view('backend.Bidding.index',compact('bidsitems'));
        
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Bidauction::updateOrCreate([
            'user_id'=>Auth::id(),
            'product_id'=>$request->product_id,
            'auction_id'=>$request->auction_id,
            'bid_amount'=>$request->bid_amount,
            'created_at'=>Carbon::now(),
        ]);
        return back();
    }

    public function show()
    {
        $today = Carbon::today();
        $bid_history = Bidauction::whereDate('created_at',$today)->max('bid_amount');
        $bid_info = Bidauction::where('user_id',Auth::id())->whereDate('created_at',$today)->get();
        return view('backend.Bidding.bid_history',compact('bid_info','bid_history'));
    }

    public function showhistory()
    {
        $today = Carbon::today();
        $bid_history = Bidauction::whereDate('created_at',$today)->max('bid_amount');
        $all_history_bid = Bidauction::select(['id','user_id','product_id','auction_id','bid_amount','status'])->whereDate('created_at',$today)->get();
        return view('backend.Bidding.allbid_history',compact('all_history_bid','bid_history'));
    }

    public function winstatus(Request $request)
    {
        Bidauction::find($request->id)->update([
            'status'=>$request->status
        ]);
        return back();
    }

    public function bidproduct()
    {
        $today = Carbon::today();
        $bidproduct = Bidauction::where('user_id',Auth::id())->where('status','win')->whereDate('created_at',$today)->get();
        // dd($bidproduct);
        return view('backend.Bidding.bidproduct',compact('bidproduct'));
    }
}
