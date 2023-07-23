@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper">
    {{-- <div class="row">
        <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="mb-2 text-dark font-weight-normal">{{ $bidsitems[0]->auction_title }}</h5>
              <h2 class="mb-4 text-dark font-weight-bold">{{ App\Models\Category::find($bidsitems[0]->category_id)->name }}</h2>
              <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-lightbulb icon-md absolute-center text-dark"></i></div>
              <p class="mt-4 mb-0">{{ App\Models\Product::find($bidsitems[0]->product_id)->product_name }}</p>
              <h3 class="mb-0 font-weight-bold mt-2 text-dark"></h3>
              <img src="{{ asset('uploads/product') }}/{{ App\Models\Product::find($bidsitems[0]->product_id)->product_image }}" alt="">
            </div>
          </div>
        </div>
    </div> --}}
    {{-- @if ($bidsitems == 'true') --}}
    @foreach ($bidsitems as $item)

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
                    <form action="{{ route('bid.store') }}" action="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                        <input type="hidden" name="auction_id" value="{{ $item->id }}">
                    <table class="table table-striped">
                        <tr>
                            <td>Product Name:</td>
                            <td>{{ App\Models\Product::find($item->product_id)->product_name }}</td>
                            {{-- <td>{{ $item->product_name }}</td> --}}
                        </tr>
                        <tr>
                            <td>Product Price:</td>
                            <td>{{ App\Models\Product::find($item->product_id)->price }}</td>
                            {{-- <td>{{ $item->price }}</td> --}}
                        </tr>
                        <tr>
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
                        </tr>
                    </table>
                    <br>
                    <button type="submit" class="btn btn-success btn-sm">Bid The Product</button>
                </form>
                </div>
            </div>
        </div>
    </div>

  
    @endforeach
    {{-- @else
    <h1>there is no live auction today</h1>
@endif --}}
</div>

@endsection