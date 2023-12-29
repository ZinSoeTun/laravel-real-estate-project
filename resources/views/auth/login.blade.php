<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>User Login Page</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

     <!-- Favicons -->
     <link href="{{ asset('user/img/1H5TLj-LogoMakr-removebg-preview.png') }}" rel="icon">
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
$(document).ready(function () {
 $(".toggle-password").click(function () {
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
<body >
      {{-- password update success messages --}}
      <div>
        @if (session('success'))
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-square-check me-3"></i><strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <!--  registration form -->
        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block">
                                    <img src="{{ asset('user/img/my image.png') }}" width="500" height="650">
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Log In</h1>
                                        </div>
                                        <form class="user"  action="{{ route('login') }}" method="POST">
                                            @csrf
                                            {{-- email --}}
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email:</label>
                                                <input type="text" class="form-control form-control-user @error('email')is-invalid @enderror" id="email"
                                                    name="email" placeholder="Enter your email..." value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="text-danger">*{{ $message }}</div>
                                                @enderror
                                            </div>
                                            {{-- password --}}
                                            <div  class="form-group">
                                                <label for="password" class="form-label">Password:</label>
                                                <div class="password-input-container ">
                                                    <input type="password" class="form-control form-control-user password-input @error('password')is-invalid @enderror"
                                                        id="password" name="password" placeholder="Enter your password..."
                                                        value="{{ old('password') }}">
                                                    <i class="toggle-password fa fa-eye"></i>
                                                    <i class="toggle-password fa fa-eye-slash"></i>
                                                    @error('password')
                                                        <div class="text-danger">*{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- remember me --}}
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary w-100" style="border-radius: 30px">
                                                <input type="submit" value="Login" class="btn btn-primary" style="border-radius: 30px">
                                            </button>
                                            <hr>
                                        </form>
                                        <hr>
                                            @if (Route::has('password.request'))
                                            <div class="text-center">
                                                <a class="small"href="{{ route('password.request') }}"> Forgot Password?</a>
                                            </div>
                                            @endif
                                            <div class="text-center">
                                                <img class="inline-block my-3" src="{{ asset('user/img/1H5TLj-LogoMakr-removebg-preview.png') }}" width="80" height="80"
                                                    alt="logo">
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
</body>
   <!-- Bootstrap core JavaScript-->
   <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
   <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

   <!-- Core plugin JavaScript-->
   <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

   <!-- Custom scripts for all pages-->
   <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>
</html>
