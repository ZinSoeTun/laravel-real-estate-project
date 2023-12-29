<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Register Page</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    {{--  --}}

    <!-- Favicons -->
    <link href="{{asset('user/img/1H5TLj-LogoMakr-removebg-preview.png')}}" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    {{-- font aweson cdn link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- Custom fonts for this template-->
   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link
       href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
       rel="stylesheet">

   <!-- Custom styles for this template-->
   <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    {{-- jquery link --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script>
        //jquery
        $(document).ready(function() {
            $(".toggle-password").click(function() {
                var passwordInput = $($(this).siblings(".password-input"));
                var icon = $(this);
                if (passwordInput.attr("type") == "password") {
                    passwordInput.attr("type", "text");
                    icon.removeClass("fa-eye-slash").addClass("fa-eye");
                } else {
                    passwordInput.attr("type", "password");
                    icon.removeClass("fa-eye").addClass("fa-eye-slash");
                }
            });
        });
    </script>
    <style>
        .password-input-container {
            position: relative;
        }
        .password-input {
            padding-right: 32px;
        }
        .toggle-password {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            z-index: 9999;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="{{ asset('user/img/my image.png') }}" width="500" height="700">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account</h1>
                            </div>

                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                {{-- Name --}}
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text"
                                            class="form-control form-control-user  @error('name')is-invalid @enderror"
                                            id="exampleFirstName" placeholder="Enter your name..."
                                            value="{{ old('name') }}" name="name" id="name">
                                        @error('name')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- Email --}}
                                    <div class="col-sm-6">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="text"
                                            class="form-control form-control-user  @error('name')is-invalid @enderror"
                                            id="exampleLastName" placeholder="Enter your email..."
                                            value="{{ old('email') }}" name="email" id="email">
                                        @error('name')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Password --}}
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="password" class="form-label">Password:</label>
                                        <div class="password-input-container">
                                            <input type="password"
                                                class="form-control password-input form-control-user  @error('name')is-invalid @enderror"
                                                id="exampleInputEmail" placeholder="Enter your password..."
                                                value="{{ old('password') }}" name="password" id="password">
                                            <i class="toggle-password fa fa-eye"></i>
                                            <i class="toggle-password fa fa-eye-slash"></i>
                                            @error('name')
                                                <div class="text-danger">*{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Password Comfirmation --}}
                                    <div class="col-sm-6">
                                        <label for="comfirm" class="form-label">Comfirm Password:</label>
                                        <div class="password-input-container">
                                            <input type="password"
                                                class="form-control password-input form-control-user  @error('name')is-invalid @enderror"
                                                id="exampleInputEmail" placeholder="Enter your password again..."
                                                value="{{ old('password_confirmation') }}" name="password_confirmation"
                                                id="comfirm">
                                            <i class="toggle-password fa fa-eye"></i>
                                            <i class="toggle-password fa fa-eye-slash"></i>
                                            @error('name')
                                                <div class="text-danger">*{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- input hidden role --}}
                                <div>
                                    <input type="hidden" name="role" value="user">
                                </div>
                                {{-- Phone --}}
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="phone" class="form-label">Phone:</label>
                                        <input type="text"
                                            class="form-control form-control-user  @error('name')is-invalid @enderror"
                                            id="exampleInputPassword" placeholder="Enter your phone number..."
                                            value="{{ old('phone') }}" name="phone" id="phone">
                                        @error('name')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- Address --}}
                                    <div class="col-sm-6">
                                        <label for="address" class="form-label">Address:(Optional)</label>
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Enter your address..."
                                            value="{{ old('address') }}" name="address" id="address">
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100" style="border-radius: 30px">
                                    <input type="submit" value="Register" class="btn btn-primary" style="border-radius: 30px">
                                </button>
                                <hr>
                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="mt-4">
                                        <x-label for="terms">
                                            <div class="flex items-center">
                                                <x-checkbox name="terms" id="terms" required />

                                                <div class="ml-2">
                                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' =>
                                                            '<a target="_blank" href="' .
                                                            route('terms.show') .
                                                            '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                            __('Terms of Service') .
                                                            '</a>',
                                                        'privacy_policy' =>
                                                            '<a target="_blank" href="' .
                                                            route('policy.show') .
                                                            '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                            __('Privacy Policy') .
                                                            '</a>',
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </x-label>
                                    </div>
                                @endif
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                                </div>
                            </form>
                            <div class="text-center my-3">
                                <img class="inline-block" src="{{ asset('user/img/1H5TLj-LogoMakr-removebg-preview.png') }}" width="80"
                                    height="90" alt="logo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!--  botstrap  js cdn link  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>

</html>
