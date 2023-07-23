@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Category Information</h4>
                {{-- <a class="btn btn-dark d-flex justify-items-end">Back</a> --}}
                <form class="forms-sample" method="POST" action="{{ route('category.store') }}">
                    @csrf
                  <div class="form-group">
                    <label class="form-label text-dark">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Category name">
                  </div>
                  <div class="form-group">
                    <label class="form-label text-dark">Description</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="" class="form-label text-dark">Status</label>
                    <select name="status" id="" class="form-control">
                      <option value="">Choose Option</option>
                        <option value="inactive">Inactive</option>
                        <option value="active">Active</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
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