@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper">
    <div class="row" id="proBanner">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">All Bid History of Buyer and See Only Seller</h4>
                <span class="bg-dark text-white p-2">Today hightest Bid Amount  {{ $bid_history }}</span>
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
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($all_history_bid as $info)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ App\Models\User::find($info->user_id)->name }}</td>
                      <td>{{ App\Models\Product::find($info->product_id)->product_name }}</td>
                      <td>{{ App\Models\Auction::find($info->auction_id)->auction_title }}</td>
                      <td>{{ $info->bid_amount }}</td>
                      <td>
                        <form action="{{ route('bid.winstatus') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $info->id }}">
                            <select name="status" id="" class="form-control">
                                <option value="">Choose</option>
                                <option value="win">Win</option>
                                <option value="lost">Lost</option>
                                <option value="NULL">NULL</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-success">done</button>
                        </form>
                      </td>
                      <td>
                        <a href="{{ url('/auction/delete') }}/{{ $info->id }}" class="btn btn-danger btn-sm">delete</a>
                      </td>
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