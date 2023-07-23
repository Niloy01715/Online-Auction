<?php

namespace App\Http\Controllers;

use App\Events\AuctionHistory;
use App\Models\Auction;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\UserAuctionHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuctionController extends Controller
{
    public function index()
    {
        $auction_info = Auction::select(['id','auction_title','live_auction_date','live_auction_start_time','live_auction_end_time','admin_status'])->get();
        return view('backend.auction.index',compact('auction_info'));
    }
    public function create()
    {
        $sellers = User::select(['id','role','name'])->where('role','buyer')->get();
        $categorys = Category::select(['id','name'])->get();
        $products = Product::select(['id','product_name'])->get();
        return view('backend.auction.create',compact('categorys','products','sellers'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        Auction::updateOrCreate([
            'auction_title'=>$request->auction_title,
            'category_id'=>$request->category_id,
            'product_id'=>$request->product_id,
            'live_auction_date'=>$request->live_auction_date,
            'live_auction_start_time'=>$request->live_auction_start_time,
            'live_auction_end_time'=>$request->live_auction_end_time,
            'reverse_price'=>$request->reverse_price,
            'minimum_bid'=>$request->minimum_bid,
            'bid_increment'=>$request->bid_increment,
            'buy_now_price'=>$request->buy_now_price,
            'auction_status'=>$request->auction_status,
            'admin_status'=>$request->admin_status,
            'description'=>$request->description,
            'terms'=>$request->terms,
            'buy_now_item'=>$request->buy_now_item,
        ]);
        Alert::success('Auction Added Successfully');
        //event fire/trigger/dispatch
        $user = Auth::user();
        event(new AuctionHistory($user));

        // return back();
        return redirect()->route('auction.index');
    }

    public function view($id)
    {
        return view('backend.auction.view');
    }

    public function edit($id)
    {
        $auction_edit = Auction::find($id);
        $sellers = User::select(['id','role','name'])->where('role','buyer')->get();
        $categorys = Category::select(['id','name'])->get();
        $products = Product::select(['id','product_name'])->get();
        return view('backend.auction.edit',compact('auction_edit','sellers','categorys','products'));
    }

    public function update(Request $request)
    {
        Auction::find($request->id)->update([
            'auction_title'=>$request->auction_title,
            'user_id'=>$request->user_id,
            'category_id'=>$request->category_id,
            'product_id'=>$request->product_id,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'live_auction_date'=>$request->live_auction_date,
            'live_auction_start_time'=>$request->live_auction_start_time,
            'live_auction_end_time'=>$request->live_auction_end_time,
            'reverse_price'=>$request->reverse_price,
            'minimum_bid'=>$request->minimum_bid,
            'bid_increment'=>$request->bid_increment,
            'buy_now_price'=>$request->buy_now_price,
            'auction_status'=>$request->auction_status,
            'admin_status'=>$request->admin_status,
            'bid_increment_name'=>$request->bid_increment_name,
            'description'=>$request->description,
            'terms'=>$request->terms,
            'buy_now_item'=>$request->buy_now_item,
            'features'=>$request->features,
        ]);
        Alert::success('Auction Updated Successfully');
        return redirect()->route('auction.index');
    }

    public function distroy($id)
    {
        $auctions = Auction::find($id);
        $auctions->delete();
        Alert::success('Auction Deleted Successfully');
        // Toastr::success('Module deleted Successfully');
        return redirect()->route('auction.index');
    }

    public function notification()
    {
        $auction_histroy = UserAuctionHistory::select("*")->whereDate('created_at', Carbon::today())->get();
        // dd($auction_histroy);
        return view('backend.notification.index',compact('auction_histroy'));
    }

    // public function timewise()
    // {
    //     // $shaon = Auction::whereBetween('created_at', ['live_auction_start_time'.' 00:00:00','live_auction_end_time'.' 23:59:59'])->get();
        
    //     // $startTimestamp = Carbon::parse('2023-01-01 00:00:00');
    //     // $endTimestamp = Carbon::parse('2023-12-31 23:59:59');
    //     $shaon = Auction::where('user_id',Auth::id())->where('live_auction_end_time',Carbon::now()->format('H:i:s'))->get();
    //     dd($shaon);
    // }
}
