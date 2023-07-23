@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper">
    <div class="row" id="proBanner">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Buyer Order History</h4>
                {{-- <span class="bg-dark text-white p-2">Today hightest Bid Amount  {{ $bid_history }}</span> --}}
                </p>
                <table class="table table-hover table-dark">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>User Name</th>
                      <th>Product name</th>
                      <th>Bid Amount</th>
                      <th>Payment Mode</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($order_info as $info)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ Auth::user()->name }}</td>
                      <td>{{ App\Models\Product::find($info->product_id)->product_name }}</td>
                      <td>{{ $info->bid_amount }}</td>
                      <td>{{ $info->payment_mode }}</td>
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