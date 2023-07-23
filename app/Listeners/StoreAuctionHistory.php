<?php

namespace App\Listeners;

use App\Events\AuctionHistory;
use App\Models\UserAuctionHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreAuctionHistory
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AuctionHistory $event): void
    {
        // dd($event,'done');
        $userinfo = $event->user;
        UserAuctionHistory::create([
            'user_id' => $userinfo->id,
            'name' => $userinfo->name,
            'email' => $userinfo->email
        ]);

        // return $AuctionHistory;
    }
}
