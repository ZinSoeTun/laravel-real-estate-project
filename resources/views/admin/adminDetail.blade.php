@extends('admin.layout')
@section('title', 'Admin Detail Page')
@section('content')
 <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Account</li>
              <li class="breadcrumb-item" aria-current="page">Admin List</li>
              <li class="breadcrumb-item active text-primary" aria-current="page">Admin Detail</li>
            </ol>
        </nav>
    <main>
        <div class="card mx-auto bg-dark text-light" style="width: 18rem;">
              {{-- admin image --}}
             @if ($data->image == NULL)
             <div class="text-center my-4">
                 <img src="{{ asset('user/img/noimage.png') }}" alt="noimage" width="150"
                     height="150">
             </div>
         @else
         {{-- No image --}}
             <div class="text-center my-4">
                 <img class="rounded-circle img-thumbnail"
                     src="{{ asset('storage/profile/' . $data->image) }}" alt="image"
                     width="150" height="150">
             </div>
         @endif
         {{-- admin data --}}
           <div class="card-body text-center">
            <h5 class="card-title">Admin ID : {{$data->id}}</h5>
             <h5 class="card-title">Admin Name : {{$data->name}}</h5>
             <h5 class="card-title">Admin Email : {{$data->email}}</h5>
             <h5 class="card-title">Admin Phone : {{$data->phone}}</h5>
             <h5 class="card-title">Admin Address : {{$data->address}}</h5>
             <h5 class="card-title">Registered Date : {{$data->created_at}}</h5>
           </div>
    </main>
    @endsection
