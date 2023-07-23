<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;
    protected $fillable = ['id','auction_title','user_id','category_id','product_id','start_date','end_date','live_auction_date','live_auction_start_time','live_auction_end_time','reverse_price','minimum_bid','bid_increment','buy_now_price','auction_status','admin_status','bid_increment_name','description','terms','buy_now_item','features'];

}
