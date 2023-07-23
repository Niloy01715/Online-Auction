@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper">
    <div class="row" id="proBanner">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">User Manage Table</h4>
                </p>
                <table class="table table-hover table-dark">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Phone no</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($user_manage as $users)
                    <tr>
                      <td>{{  $loop->index+1 }}</td>
                      <td>{{ $users->name }}</td>
                      <td>{{ $users->email }}</td>
                      <td><label class="badge badge-success">{{ $users->role }}</label></td>
                      <td>{{ $users->phone_no }}</td>
                      <td>
                        <form action="{{ route('user.destroy',$users->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          {{-- <button type="submit" class="btn btn-danger btn-sm show_confirm btn-icon-text" href=""><i class="mdi mdi-delete"></i>Delete</button> --}}
                          <button type="submit" class="btn btn-danger btn-icon-text">Delete<i class="mdi mdi-delete btn-icon-prepend"></i></button>
                      </form>
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