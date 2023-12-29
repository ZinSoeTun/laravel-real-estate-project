@extends('users.layout')
@section('title', 'Profile  Change Password Page')
 <!-- Favicons -->
 <link href="{{asset('user/img/1H5TLj-LogoMakr-removebg-preview.png')}}" rel="icon">
 {{-- jquery link --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
 <style>
    .password-input-container {
        position: relative;
    }

    .password-input {
        padding-right: 78px;
    }

    .toggle-password {
        position: absolute;
        top: 10px;
        right: 20px;
        cursor: pointer;
        z-index: 9999;
    }
</style>
 @section('content')
     <!-- Change Password Tab -->
     <h1 class="text-center text-primary" style="margin-top: 100px">Change Password</h1>
       {{-- password update error message --}}
    <div>
        @if (session('error'))
            <div  class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                <i class=" text-danger fa-solid fa-circle-exclamation me-3"></i><strong>{{ session('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
     <div  class="border mb-5 w-75 mx-auto rounded-5">
        <!-- Change Password Form -->
        <form action="{{route('user.profile.changePassword')}}" method="POST">
            @csrf
            <!--Old Password -->
            <div class=" mb-3 row mt-4">
                <label for="oldPassword" class="form-label col-md-5 text-center  col-3">Old Password:</label>
                <div class="password-input-container col-md-6 col-8">
                    <input type="password"
                        class="form-control password-input  @error('oldPassword')is-invalid @enderror"
                        id="oldPassword" name="oldPassword"> <i
                        class="toggle-password fa fa-eye"></i>
                        <i class="toggle-password fa fa-eye-slash"></i>
                </div>
                @error('oldPassword')
                    <div class=" col-md-6 col-8 text-danger offset-md-5 offset-3">*{{ $message }}</div>
                @enderror
            </div>
            <!--New Password -->
            <div class="mb-3 row">
                <label for="newPassword" class="form-label col-md-5 text-center  col-3">New Password:</label>
                <div class="password-input-container col-md-6 col-8">
                    <input type="password"
                        class="form-control password-input  @error('newPassword')is-invalid @enderror"
                        id="newPassword" name="newPassword"> <i
                        class="toggle-password fa fa-eye"></i>
                        <i class="toggle-password fa fa-eye-slash"></i>
                </div>
                @error('newPassword')
                    <div class=" col-md-6 col-8 text-danger offset-md-5 offset-3">*{{ $message }}</div>
                @enderror
            </div>
            <!--Comfirm Password -->
            <div class="mb-3 row">
                <label for="comfirmPassword" class="form-label col-md-5 text-center  col-3">Comfirm
                    Password:</label>
                <div class="password-input-container col-md-6 col-8">
                    <input type="password"
                        class="form-control password-input  @error('comfirmPassword')is-invalid @enderror"
                        id="comfirmPassword" name="comfirmPassword"> <i
                        class="toggle-password fa fa-eye"></i>
                        <i class="toggle-password fa fa-eye-slash"></i>
                </div>
                @error('comfirmPassword')
                    <div class=" col-md-6 col-8 text-danger offset-md-5 offset-3">*{{ $message }}</div>
                @enderror
            </div>
            <!--  Edit btn -->
            <div class=" float-end">
                <input type="submit" value="Save Change" class="btn btn-success">
            </div>
        </form>

    </div>
    <!-- End Change Password Tab -->
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
        })
    </script>
 @endsection
