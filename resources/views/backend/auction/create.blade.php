@extends('layouts.backend.app')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Auction Information</h4>
                {{-- <a class="btn btn-dark d-flex justify-items-end">Back</a> --}}
                <form class="forms-sample" method="POST" action="{{ route('auction.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Auction Title</label>
                                <input type="text" class="form-control" id="name" name="auction_title" placeholder="Auction Title">
                            </div>
                        </div>
                        <!-- <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Buyer Name</label>
                                <select name="user_id" id="" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($sellers as $seller)
                                        <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> -->
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Category Name</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="">Chosse category</option>
                                    @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                    <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Live Auction date</label>
                                <input type="date" class="form-control" id="name" name="live_auction_date" placeholder="Auction Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Start date</label>
                                <input type="date" class="form-control" id="name" name="start_date" placeholder="Auction Title">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">End date</label>
                                <input type="date" class="form-control" id="name" name="end_date" placeholder="Auction Title">
                            </div>
                        </div> -->
                       
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Live Auction start time</label>
                                <input type="time" class="form-control" id="name" name="live_auction_start_time" placeholder="Auction Title">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Live Auction end time</label>
                                <input type="time" class="form-control" id="name" name="live_auction_end_time" placeholder="Auction Title">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Reserve Price</label>
                                <input type="text" class="form-control" id="name" name="reverse_price" placeholder="Auction Title">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Minimum Bid</label>
                                <input type="text" class="form-control" id="name" name="minimum_bid" placeholder="Auction Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Buy Now Price</label>
                                <input type="text" class="form-control" id="name" name="buy_now_price" placeholder="Auction Title">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Auction Status</label>
                                <select name="auction_status" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="new">New</option>
                                    <option value="open">Open</option>
                                    <option value="suspend">Suspend</option>
                                    <option value="close">Close</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Admin Status</label>
                                <select name="admin_status" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="pending">pending</option>
                                    <option value="approved">approved</option>
                                    <option value="rejected">rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Bid Increment</label>
                                <input type="text" class="form-control" id="name" name="bid_increment" placeholder="Auction Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       
                        <!-- <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Is it Bid Increment </label>
                                <select name="bid_increment_name" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                              </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label text-dark">Description</label>
                                <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label text-dark">Terms & Condition</label>
                                <textarea name="terms" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Is it Buy Now Item</label>
                                <select name="buy_now_item" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-3">
                            <div class="form-group">
                                <label class="form-label text-dark">Is it Features Item</label>
                                <select name="features" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
