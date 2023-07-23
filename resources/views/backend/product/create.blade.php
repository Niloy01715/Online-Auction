@extends('layouts.backend.app')
@section('content')

@push('admin.css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Product Information</h4>
                {{-- <a class="btn btn-dark d-flex justify-items-end">Back</a> --}}
                <form class="forms-sample" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group">
                      <label for="" class="form-label text-dark">Category</label>
                      <select name="category_id" id="" class="form-control">
                        <option value="">Choose Option</option>
                          @foreach ($categorys as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <label class="form-label text-dark">Product Name</label>
                    <input type="text" class="form-control" id="name" name="product_name" placeholder="Product name">
                  </div>
                  <div class="form-group">
                    <label class="form-label text-dark">Product Price</label>
                    <input type="text" class="form-control" id="name" name="price" placeholder="Product Price">
                  </div>
                  <div class="form-group">
                    <label class="form-label text-dark">Image</label>
                    <input type="file" class="form-control dropify" name="product_image">
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
@push('admin.script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.dropify').dropify({
        messages: {
            'default': 'Upload product image',
        }
    });
</script>
@endpush