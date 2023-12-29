@extends('admin.layout')
@section('title', 'Agent Detail Page')
@section('content')
 <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Agent</li>
              <li class="breadcrumb-item" aria-current="page">Agent List</li>
              <li class="breadcrumb-item active text-primary" aria-current="page">Agent Detail</li>
            </ol>
        </nav>
    <main>
        <div class="card mx-auto bg-dark text-light" style="width: 30rem;">
              {{-- agent image --}}
             @if ($data->image == NULL)
             <div class="text-center my-4">
                 <img src="{{ asset('user/img/noimage.png') }}" alt="noimage" width="150"
                     height="150">
             </div>
         @else
             <div class="text-center my-4">
                 <img class="rounded-circle img-thumbnail"
                     src="{{ asset('storage/agent/' . $data->image) }}" alt="image"
                     width="150" height="150">
             </div>
         @endif
         {{-- agent data --}}
           <div class="card-body text-center">
            <h5 class="card-title"><span class="text-success">Agent ID :</span> {{$data->id}}</h5>
             <h5 class="card-title"><span class="text-success">Agent Name :</span> {{$data->name}}</h5>
             <h5 class="card-title"><span class="text-success">Agent Email :</span> {{$data->email}}</h5>
             <h5 class="card-title"><span class="text-success">Agent Phone :</span> {{$data->phone}}</h5>
             <h5 class="card-title"><span class="text-success">Agent Address :</span> {{$data->address}}</h5>
             <h5 class="card-title"><span class="text-success">Language :</span> {{$data->language}}</h5>
             <h5 class="card-title"><span class="text-success">Agent Citizen :</span> {{$data->citizen}}</h5>
             <h5 class="card-title"><span class="text-success">Registered Date : </span>{{$data->created_at}}</h5>
           </div>
    </main>
    @endsection
