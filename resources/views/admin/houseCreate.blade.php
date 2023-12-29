@extends('admin.layout')
@section('title', 'House Create Page')
@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">House</li>
      <li class="breadcrumb-item active text-primary" aria-current="page">House Create</li>
    </ol>
  </nav>

  <main>
      {{-- house create success message --}}
      <div class="col-lg-6 offset-lg-3">
        <div style="width: 500px;" class="text-success mx-2 mx-auto">
            @if (session('success'))
                <div class="alert alert-primary bg-success text-center alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-square-check me-3"></i><strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        {{--  error message --}}
        <div style="width: 500px;" class="text-success mx-2 mx-auto">
            @if (session('error'))
                <div style="color: white" class="alert alert-light bg-danger text-center alert-dismissible fade show" role="alert">
                    <i class=" bg-danger fa-solid fa-circle-exclamation me-3"></i><strong>{{ session('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>
    {{-- house create property --}}
    <div class="container-fluid">
        <div class="col-lg-6 offset-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center">Create Houses</h3>
                    </div>
                    {{-- horizontal line --}}
                    <br>
                    {{-- house property form --}}
                    <form action="{{route('admin.house.houseCreate')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        {{-- house type --}}
                        <div class="form-group mb-3">
                            <label for="houseType" class="form-label">House Type:</label>
                            <input type="text" name="houseType"
                                class="form-control @error('houseType')  is-invalid @enderror"
                                placeholder="house  type..." value="{{old('houseType')}}">
                            @error('houseType')
                                <div class="text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- button  for house property create --}}
                        <div class="text-center">
                            <input type="submit" value="create" class="btn btn-success px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </main>

@endsection
