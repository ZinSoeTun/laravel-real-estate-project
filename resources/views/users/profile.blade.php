@extends('users.layout')
@section('title', 'Profile Page')
<!-- Favicons -->
<link href="{{ asset('user/img/1H5TLj-LogoMakr-removebg-preview.png') }}" rel="icon">
@section('content')

    {{-- profile detail --}}
    <div class="container border w-50 row mx-auto mb-5 rounded-5 " style="margin-top: 100px">
        <h5 class="text-center my-5"><i class='fas fa-address-card me-2 text-success'></i>Profile
            Details</h5>

        {{-- profile image --}}
        @if (Auth::user()->image == null)
            <div class="col-12 col-md-5 ms-4">
                <img src="{{ asset('user/img/noimage.png') }}" alt="noimage" width="150" height="150">
            </div>
        @else
            <div class="col-12 col-md-5 ms-4">
                <img class="rounded-circle img-thumbnail" src="{{ asset('storage/profile/' . Auth::user()->image) }}"
                    alt="image" width="150" height="150">
            </div>
        @endif

        <div class="col-12 col-md-5">
            <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label "><i
                        class='fas fa-user-circle me-2 text-success'></i>Name:{{ Auth::user()->name }}</div>
                <div class="col-lg-9 col-md-8"></div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label "><i
                        class='fas fa-user-check me-2 text-success'></i>Role:{{ Auth::user()->role }}</div>
                <div class="col-lg-9 col-md-8"></div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label "><i
                        class='far fa-address-book me-2 text-success'></i></i>Email:{{ Auth::user()->email }}</div>
                <div class="col-lg-9 col-md-8"></div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label "><i
                        class='fas fa-bell me-2 text-success'></i>Phone:{{ Auth::user()->phone }}</div>
                <div class="col-lg-9 col-md-8"></div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-3 col-md-4 label "><i
                        class='fas fa-map-marker-alt me-2 text-success'></i>Address:{{ Auth::user()->address }}</div>
                <div class="col-lg-9 col-md-8"> </div>
            </div>
            {{-- change password --}}
            <a href="{{ route('user.profile.toChangePassword') }}">
                <button class="btn btn-warning float-end mb-3 mt-3">
                    Change Password
                </button>
            </a>
            {{-- edit profile --}}
            <a href="{{ route('user.profile.edit') }}">
                <button class="btn btn-warning float-end me-2 mb-3 mt-3">
                    Edit
                </button>
            </a>
        </div>
    </div>
@endsection
