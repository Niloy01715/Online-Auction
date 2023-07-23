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
                <h4 class="card-title">Settings Information</h4>
                {{-- <a class="btn btn-dark d-flex justify-items-end">Back</a> --}}
                <form class="forms-sample" method="POST" action="{{ url('//apperance/setting') }}/{{ $setting->id }}" enctype="multipart/form-data">
                    @csrf
                  <input type="text" name="id" value="{{ $setting->id }}">
                  <div class="form-group">
                    <label class="form-label text-dark">Application Name</label>
                    <input type="text" class="form-control" id="name" name="app_name" value="{{ env('APP_NAME') }}">
                  </div>
                 
                  <div class="form-group">
                    <label class="form-label text-dark">Application Logo</label>
                    <input type="file" class="form-control dropify" name="logo_image" data-default-file="">
                  </div>
                  <div class="form-group">
                    <label class="form-label text-dark">Fav Icon</label>
                    <input type="file" class="form-control dropify2" name="fav_image" data-default-file="">
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Update</button>
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
            'default': 'Upload Image',
        }
    });
    $('.dropify2').dropify({
        messages: {
            'default': 'Upload Favlogo',
        }
    });
</script>
@endpush