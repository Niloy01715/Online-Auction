@extends('layouts.backend.app')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Auction Information</h4>
                <a href="{{ route('auction.index') }}" class="btn btn-dark">View Auction</a>
                <form class="forms-sample" method="POST" action="{{ route('auction.update') }}">
                    @csrf
                    <input type="text" name="id" value="{{ $auction_edit->id }}">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Auction Title</label>
                                <input type="text" class="form-control" value="{{ $auction_edit->auction_title }}" name="auction_title" placeholder="Auction Title">
                            </div> 
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Buyer Name</label>
                                <select name="user_id" id="" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($sellers as $seller)
                                        <option {{ $auction_edit->user_id ===  $seller->id  ? 'Selected':'' }} value="{{ $seller->id }}">{{ $seller->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Category Name</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="">Chosse category</option>
                                    @foreach ($categorys as $category)
                                    <option {{ $auction_edit->category_id === $category->id ? 'Selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Product Name</label>
                                <select name="product_id" id="" class="form-control">
                                    <option value="">Chosse Product</option>
                                    @foreach ($products as $product)
                                    <option {{ $auction_edit->product_id === $product->id ? 'Selected':'' }} value="{{ $product->id }}">{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Start date</label>
                                <input type="date" class="form-control" id="name" name="start_date" value="{{ $auction_edit->start_date }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">End date</label>
                                <input type="date" class="form-control" id="name" name="end_date" value="{{ $auction_edit->end_date }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Live Auction date</label>
                                <input type="date" class="form-control" id="name" name="live_auction_date"  value="{{ $auction_edit->live_auction_date }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Live Auction start time</label>
                                <input type="time" class="form-control" id="name" name="live_auction_start_time" value="{{ $auction_edit->live_auction_start_time }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Live Auction end time</label>
                                <input type="time" class="form-control" id="name" name="live_auction_end_time" value="{{ $auction_edit->live_auction_end_time }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Reserve Price</label>
                                <input type="text" class="form-control" id="name" name="reverse_price" value="{{ $auction_edit->reverse_price }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Minimum Bid</label>
                                <input type="text" class="form-control" id="name" name="minimum_bid" value="{{ $auction_edit->minimum_bid }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Bid Increment</label>
                                <input type="text" class="form-control" id="name" name="bid_increment" value="{{ $auction_edit->bid_increment }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Buy Now Price</label>
                                <input type="text" class="form-control" id="name" name="buy_now_price" value="{{ $auction_edit->buy_now_price }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Auction Status</label>
                                <select name="auction_status" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option {{ ($auction_edit->auction_status == 'new') ? 'Selected':'' }} value="new">New</option>
                                    <option {{ ($auction_edit->auction_status == 'open') ? 'Selected':'' }} value="open">Open</option>
                                    <option {{ ($auction_edit->auction_status == 'suspend') ? 'Selected':'' }} value="suspend">Suspend</option>
                                    <option {{ ($auction_edit->auction_status == 'close') ? 'Selected':'' }} value="close">Close</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Admin Status</label>
                                <select name="admin_status" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option {{ ($auction_edit->admin_status == 'pending') ? 'Selected':'' }} value="pending">pending</option>
                                    <option {{ ($auction_edit->admin_status == 'approved') ? 'Selected':'' }} value="approved">approved</option>
                                    <option {{ ($auction_edit->admin_status == 'rejected') ? 'Selected':'' }} value="rejected">rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Is it Bid Increment </label>
                                <select name="bid_increment_name" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option {{ ($auction_edit->bid_increment_name == 'yes') ? 'Selected':'' }} value="yes">Yes</option>
                                    <option {{ ($auction_edit->bid_increment_name == 'no') ? 'Selected':'' }} value="no">No</option>
                                </select>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label text-dark">Description</label>
                                <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ $auction_edit->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label text-dark">Terms & Condition</label>
                                <textarea name="terms" class="form-control" id="" cols="30" rows="10">{{ $auction_edit->terms }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Is it Buy Now Item</label>
                                <select name="buy_now_item" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option {{ ($auction_edit->buy_now_item == 'yes') ? 'Selected':'' }} value="yes">Yes</option>
                                    <option {{ ($auction_edit->buy_now_item == 'no') ? 'Selected':'' }} value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Is it Features Item</label>
                                <select name="features" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option {{ ($auction_edit->features == 'yes') ? 'Selected':'' }} value="yes">Yes</option>
                                    <option {{ ($auction_edit->features == 'no') ? 'Selected':'' }} value="no">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                  <button type="submit" class="btn btn-success mr-2">Update</button>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
