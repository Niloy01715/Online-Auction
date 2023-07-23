@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper">
    <div class="row" id="proBanner">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Auction Table</h4>
                <a href="{{ route('auction.create') }}" class="btn btn-dark">Add Auction</a>
                </p>
                <table class="table table-hover table-dark">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Auction Name</th>
                      <th>Start Date</th>
                      {{-- <th>End Date</th> --}}
                      <th>Live Auction Date</th>
                      <th>live Auction start time</th>
                      <th>live Auction end time</th>
                      <th>Admin status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($auction_info as $auction)
                    <tr>
                      <td>{{  $loop->index+1 }}</td>
                      <td>{{ $auction->auction_title }}</td>
                      <td>{{ date('d-m-Y',strtotime($auction->start_date)) }}</td>
                      {{-- <td>{{ date('d-m-Y',strtotime($auction->end_date)) }}</td> --}}
                      <td>{{ date('d-m-Y',strtotime($auction->live_auction_date)) }}</td>
                      <td>{{ $auction->live_auction_start_time }}</td>
                      <td>{{ $auction->live_auction_end_time }}</td>
                      <td><label class="badge badge-success">{{ $auction->admin_status }}</label></td>
                      <td>
                        <!-- <a href="{{ url('/auction/view') }}/{{ $auction->id }}" class="btn btn-success">view</a> -->
                        <a href="{{ url('/auction/edit') }}/{{ $auction->id }}" class="btn btn-primary">edit</a>
                        <a href="{{ url('/auction/delete') }}/{{ $auction->id }}" class="btn btn-danger">delete</a>
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