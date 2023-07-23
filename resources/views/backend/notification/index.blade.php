@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper">

    <h1 class="text-center p-5"><span class="text-white bg-dark p-5">{{ $auction_histroy[0]->name }} create Auction {{ $auction_histroy[0]->created_at->diffForHumans() }}</span></h1>
  
   
</div>
@endsection