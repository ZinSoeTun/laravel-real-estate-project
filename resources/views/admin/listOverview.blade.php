@extends('admin.layout')
@section('title', 'Overview List Page')
@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Overview</li>
      <li class="breadcrumb-item active text-primary" aria-current="page">Detail List</li>
    </ol>
  </nav>
    {{-- house detail list --}}
    <h1>House Detail List - {{count($data)}}</h1>
   <table class="table table-dark table-striped">
         <thead>
           <tr>
               <th>ID</th>
               <th>House ID</th>
               <th>Agent ID</th>
               <th>Location</th>
               <th></th>
           </tr>
         </thead>
         <tbody>
            @foreach ($data as $houseDetail)
            <tr>
               <th>{{$houseDetail->id}}</th>
               <th>{{$houseDetail->house_id}}</th>
               <th>{{$houseDetail->agent_id}}</th>
               <th>{{$houseDetail->location}}</th>
               <th>
                <a href="{{route('admin.overview.list.detail',$houseDetail->id )}}">
                  <button class="btn btn-warning me-2">
                        Detail
                  </button>
                </a>
                  <a href="{{route('admin.overview.list.editPage',$houseDetail->id)}}">
                  <button class="btn btn-success me-2">
                        Edit
                  </button>
                </a>
                <a href="{{route('admin.overview.list.delete',$houseDetail->id)}}">
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
@endsection
