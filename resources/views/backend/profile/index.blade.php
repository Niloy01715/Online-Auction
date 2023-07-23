@extends('layouts.backend.app')
@section('content')

<div class="content-wrapper">
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Profile Information</h4>
            <p class="card-description">Update your account's profile information and email address.</p>
            <form class="forms-sample" method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')
              <div class="form-group">
                <label for="exampleInputUsername1">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name', $user->name) }}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}">
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Profile Information</h4>
            <p class="card-description">Update your account's profile information and password.</p>
            <form class="forms-sample" method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')
                
              <div class="form-group">
                <label for="exampleInputUsername1">Current Password</label>
                <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password" autocomplete="current-password">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">New Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="New Password" autocomplete="new-password">
              </div>

              <div class="form-group">
                <label for="exampleInputUsername1">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> 
@endsection


