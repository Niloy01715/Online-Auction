{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bidbazaar</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="stylesheet" href="{{ asset('backend/assets/images/favicon.png') }}">
  </head>
  <body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
              <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left p-5">
                  <div class="brand-logo d-flex align-items-center justify-content-center">
                    <img src="{{ asset('backend/assets/images/Bidbazaar.png') }}">
                  </div>
                  <h4 class="text-center text-dark">Welcome to Bidbazaar Online Auction System</h4>
                  <!-- <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6> -->
                      <form class="pt-3" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                          <input type="text"  class="form-control form-control-lg" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                          <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg" id="phone_no" name="phone_no" placeholder="Phone No">
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                          <select class="form-control form-control-lg" id="role" name="role">
                            <option>Select Role</option>
                            <option value="seller">Seller</option>
                            <option value="buyer">Buyer</option>
                          </select>
                        </div>
                        <div class="mt-3">
                          {{-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN UP</a> --}}
                          <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                        </div>
                        <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                        </div>
                      </form>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
<!-- container-scroller -->
   <!-- plugins:js -->
   <script src="{{ asset('backend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
   <!-- endinject -->
   <!-- Plugin js for this page -->
   <!-- End plugin js for this page -->
   <!-- inject:js -->
   <script src="{{ asset('backend/assets/js/off-canvas.js') }}"></script>
   <script src="{{ asset('backend/assets/js/hoverable-collapse.js') }}"></script>
   <script src="{{ asset('backend/assets/js/misc.js') }}"></script>
   <!-- endinject -->
   <!-- Custom js for this page -->
   <!-- End custom js for this page -->
 </body>
</html>
