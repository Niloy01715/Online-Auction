@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper">
    <div class="row" id="proBanner">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Buyer Bid History</h4>
                {{-- <span class="bg-dark text-white p-2">Today hightest Bid Amount  {{ $bid_history }}</span> --}}
                </p>
                <table class="table table-hover table-dark">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>User Name</th>
                      <th>Produt Name</th>
                      <th>Auction Name</th>
                      <th>Bid Amount</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($bid_info as $info)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ Auth::user()->name }}</td>
                      <td>{{ App\Models\Product::find($info->product_id)->product_name }}</td>
                      <td>{{ App\Models\Auction::find($info->auction_id)->auction_title }}</td>
                      <td>{{ $info->bid_amount }}</td>
                      <td>{{ $info->status }}</td>
                    </tr>
                    @empty
                  
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
</div>

@endsection