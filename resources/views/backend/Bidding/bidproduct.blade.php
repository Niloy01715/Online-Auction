@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper">
    @foreach ($bidproduct as $item)
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('uploads/product') }}/{{ App\Models\Product::find($item->product_id)->product_image }}" alt=""><br>
                </div>
            </div>
        </div>
        
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    {{-- <form action="{{ route('bid.cart') }}" action="POST">
                        @csrf --}}
                    {{-- <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                    <input type="hidden" name="bidauction_id" value="{{ $item->id }}"> --}}
                    <table class="table table-striped">
                        <tr>
                            <td>Product Name:</td>
                            <td>{{ App\Models\Product::find($item->product_id)->product_name }}</td>
                            {{-- <td>{{ $item->product_name }}</td> --}}
                        </tr>
                        <tr>
                            <td>Product Price:</td>
                            <td>{{ $item->bid_amount }}</td>
                        </tr>
                        {{-- <tr>
                            <td>Start Time:</td>
                            <td>{{ $item->live_auction_start_time }}</td>
                        </tr>
                        <tr>
                            <td>End Time:</td>
                            <td>{{ $item->live_auction_end_time }}</td>
                        </tr>
                        <tr>
                            <td>Bid Amount:</td>
                            <td><input type="number" name="bid_amount" class="form-control"></td>
                        </tr> --}}
                    </table>
                    <br>
                    <a href="{{ url('/checkout') }}" class="btn btn-success btn-sm">Buy Now</a>
                </form>
                </div>
            </div>
        </div>
    </div>

  
    @endforeach
</div>

@endsection