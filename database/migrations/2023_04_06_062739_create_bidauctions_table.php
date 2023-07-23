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
        Schema::create('bidauctions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('product_id');
            $table->integer('auction_id');
            $table->integer('bid_amount');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidauctions');
    }
};
