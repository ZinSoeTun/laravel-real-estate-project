@extends('admin.layout')
@section('title', 'User List Page')
@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Account</li>
      <li class="breadcrumb-item active text-primary" aria-current="page">User List</li>
    </ol>
  </nav>
  <main>
    {{-- success message --}}
    <div style="width: 500px;" class="text-success mx-2 mx-auto">
        @if (session('success'))
            <div style="color: white" class="alert alert-light bg-success text-center alert-dismissible fade show" role="alert">
                <i class=" bg-danger fa-solid fa-circle-exclamation me-3"></i><strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    {{-- user list --}}
    <h1>User List - {{count($data)}}</h1>
   <table class="table table-dark table-striped">
         <thead>
           <tr>
               <th>ID</th>
               <th>User Name</th>
               <th>User Email</th>
               <th>Registered Date</th>
               <th></th>
           </tr>
         </thead>
         <tbody>
            @foreach ($data as $userData)
            <tr>
               <th>{{$userData->id}}</th>
               <th>{{$userData->name}}</th>
               <th>{{$userData->email}}</th>
               <th>{{$userData->created_at}}</th>
               <th>
                <a href="{{route('admin.userList.detail',$userData->id )}}">
                  <button class="btn btn-warning me-2">
                        Detail
                  </button>
                </a>
                  <a href="{{route('admin.userList.userStatus',$userData->id )}}">
                  <button class="btn btn-success me-2">
                        Change To Admin status
                  </button>
                </a>
                <a href="{{route('admin.userList.delete',$userData->id)}}">
                    <button class="btn btn-danger">
                          Delete
                    </button>
                  </a>
               </th>
           </tr>
            @endforeach
         </tbody>
     </table>

     <div>
       {{$data->links()}}
     </div>
 </main>
@endsection
