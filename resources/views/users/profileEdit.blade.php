@extends('users.layout')
@section('title', 'Profile Edit Page')
 <!-- Favicons -->
 <link href="{{asset('user/img/1H5TLj-LogoMakr-removebg-preview.png')}}" rel="icon">
 @section('content')

 <main>
    <h1 class="text-center text-primary" style="margin-top:70px"> Profile Edit</h1>
     {{-- profile update success messages --}}
     <div>
        @if (session('success'))
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-square-check me-3"></i><strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    {{-- profile update error message --}}
    <div>
        @if (session('error'))
            <div  class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                <i class=" bg-danger fa-solid fa-circle-exclamation me-3"></i><strong>{{ session('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
      <!-- Edit Profile Tab -->
      <div class="border w-75 rounded-5  mx-auto">
        {{-- profile image --}}
        @if (Auth::user()->image == null)
            <div class="text-center my-4">
                <img src="{{ asset('user/img/noimage.png') }}" alt="noimage" width="150"
                    height="150">
            </div>
        @else
            <div class="text-center my-4">
                <img class=" rounded-circle img-thumbnail"
                    src="{{ asset('storage/profile/' . Auth::user()->image) }}" alt="image"
                    width="150" height="150">
            </div>
         @endif
        <!-- Profile Edit Form -->
        <form action="{{route('user.profile.saveChange')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- image upload --}}
            <div class="mb-3 row">
                <label class="form-label col-md-5 col-3 text-center">Image Upload:</label>
                <div class=" col-md-6 col-8">
                    <input type="file"
                        class="form-control  @error('image')is-invalid @enderror" name="image">
                </div>
                @error('image')
                    <div class="text-danger offset-md-5 offset-3">*{{ $message }}</div>
                @enderror
            </div>
            <!--Name -->
            <div class="mb-3 row">
                <label for="name" class="form-label col-md-5 text-center  col-3">Name:</label>
                <div class=" col-md-6 col-8">
                    <input type="text" class="form-control  @error('name')is-invalid @enderror"
                        id="name" name="name"
                        value="{{Auth::user()->name}}">
                </div>
                @error('name')
                    <div class="text-danger offset-md-5 offset-3">*{{ $message }}</div>
                @enderror
            </div>
            <!--Phone -->
            <div class="mb-3 row">
                <label for ="phone" class="form-label col-md-5 text-center  col-3">Phone:</label>
                <div class=" col-md-6 col-8">
                    <input type="text"
                        class="form-control  @error('phone')is-invalid @enderror" id="phone"
                        name="phone" value="{{Auth::user()->phone}}">
                </div>
                @error('phone')
                    <div class="text-danger offset-md-5 offset-3">*{{ $message }}</div>
                @enderror
            </div>
            <!--Address -->
            <div class="mb-3 row">
                <label for ="address" class="form-label col-md-5 text-center  col-3">Address:</label>
                <div class=" col-md-6 col-8">
                    <textarea name="address" id="address" class="form-control" cols="30" rows="3">{{Auth::user()->address}}</textarea>
                </div>
            </div>
            <!--  Edit btn -->
            <div class=" float-end">
                <input type="submit" value="Save Change" class="btn btn-success">
            </div>
        </form>
    </div>

    <!-- End Edit Profile Tab -->
 </main>

 @endsection
