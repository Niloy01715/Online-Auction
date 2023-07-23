@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Shipping Info</h4>
                          @foreach ($bid_auction as $item)
                          {{-- <a class="btn btn-dark d-flex justify-items-end">Back</a> --}}
                          <form class="forms-sample" method="POST" action="{{ route('checkout.order') }}">
                              @csrf
                              <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                              <input type="hidden" name="bid_amount" value="{{ $item->bid_amount }}">
                              <div class="row">
                                  <div class="col-4">
                                      <div class="form-group">
                                          <label class="form-label text-dark">Buyer Name</label>
                                          <input type="text" class="form-control" id="name" name="name" placeholder="">
                                      </div>
                                  </div>
                                  <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label text-dark">Email</label>
                                        <input type="text" class="form-control" id="name" name="email" placeholder="">
                                    </div>
                                  </div>
                                  <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label text-dark">Phone no</label>
                                        <input type="text" class="form-control" id="name" name="phone_no" placeholder="">
                                    </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label text-dark">Country</label>
                                        <input type="text" class="form-control" id="name" name="country">
                                    </div>
                                  </div>
                                  <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label text-dark">Address</label>
                                        <textarea id="" cols="30" rows="10" name="address" class="form-control"></textarea>
                                    </div>
                                  </div>
                                  <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label text-dark">Payment</label>
                                        <select name="payment_mode" id="" class="form-control">
                                            <option value="">Choose On</option>
                                            <option value="COD">Cash On Delivary</option>
                                            <option value="online-payment">Online Payment</option>
                                        </select>
                                    </div>
                                  </div>
                              </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                          </form>
                          @endforeach
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('admin.script')
<script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
@endpush()