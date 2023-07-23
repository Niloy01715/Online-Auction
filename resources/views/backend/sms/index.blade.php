@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">SMS to Buyer</h4>
                <form class="forms-sample" method="POST" action="{{ route('sms.send') }}">
                    @csrf
                  <div class="form-group">
                    <label class="form-label text-dark">Buyer Phone No</label>
                    <input type="text" class="form-control" id="name" name="number" placeholder="Buyer Phone No">
                  </div>
                  <div class="form-group">
                    <label class="form-label text-dark">Message</label>
                    <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Send</button>
                </form>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection