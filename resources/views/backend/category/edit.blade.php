@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update Category Information</h4>
                {{-- <p class="card-description">Update your account's profile information and email address.</p> --}}
                <form class="forms-sample" method="POST" action="{{  route('category.update',$category->id)  }}">
                    @csrf
                    @method('PUT')
                  <div class="form-group">
                    <label class="form-label text-dark">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Category name" value="{{ $category->name }}">
                  </div>
                  <div class="form-group">
                    <label class="form-label text-dark">Description</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ $category->description }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="" class="form-label text-dark">Status</label>
                    <select name="status" id="" class="form-control">
                      <option value="">Choose Option</option>
                        <option {{ ($category->status == 'inactive') ? 'Selected':'' }} value="inactive">Inactive</option>
                        <option {{ ($category->status == 'active') ? 'Selected':'' }} value="active">Active</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-success mr-2">Update</button>
                </form>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
{{-- @push('admin.script')
  <script>
      Swal.fire(
    'Good job!',
    'You clicked the button!',
    'success'
    )
  </script>
@endpush --}}