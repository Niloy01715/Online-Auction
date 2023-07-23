@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper">
    <div class="row" id="proBanner">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Category Table</h4>
                <a href="{{ route('category.create') }}" class="btn btn-dark">Add Category</a>
                </p>
                <table class="table table-hover table-dark">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Category Name</th>
                      <th>Status</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($categorys as $item)
                    <tr>
                      <td>{{  $loop->index+1 }}</td>
                      <td>{{ $item->name }}</td>
                      @if ($item->status == 'active')
                      {{-- <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i></td> --}}
                      <td><label class="badge badge-success">Active</label></td>
                      @else
                      <td><label class="badge badge-danger">Inactive</label></td>
                      @endif
                      <td>
                        {{-- <a href="{{ route('category.edit',$item->id) }}" class="btn btn-success btn-icon-text"><i class="mdi mdi-delete"></i> Edit</a> --}}
                        <a href="{{ route('category.edit',$item->id) }}" class="btn btn-success btn-icon-text"> Edit <i class="mdi mdi-file-check btn-icon-append"></i></a>

                        <form action="{{ route('category.destroy',$item->id) }}" method="POST">
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