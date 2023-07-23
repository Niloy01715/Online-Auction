<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            // $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('product_id');
            $table->string('auction_title');
            // $table->date('start_date');
            // $table->date('end_date');
            $table->date('live_auction_date');
            $table->time('live_auction_start_time');
            $table->time('live_auction_end_time');
            $table->string('reverse_price');
            $table->string('minimum_bid');
            $table->string('bid_increment');
            $table->string('buy_now_price');
            $table->string('auction_status');
            $table->string('admin_status');
            // $table->string('bid_increment_name');
            $table->longText('description');
            $table->longText('terms');
            $table->string('buy_now_item');
            // $table->string('features');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auctions');
    }
};
