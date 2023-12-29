@extends('admin.layout')
@section('title', 'House List Page')
@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">House</li>
      <li class="breadcrumb-item active text-primary" aria-current="page">House List</li>
    </ol>
  </nav>
  <main>
     {{-- house list --}}
     <h1>House List - {{count($data)}}</h1>
    <table class="table table-dark table-striped">
          <thead>
            <tr>
                <th>ID</th>
                <th>House Type</th>
                <th>Created Date</th>
            </tr>
          </thead>
          <tbody>
             @foreach ($data as $houseData)
             <tr>
                <th>{{$houseData->id}}</th>
                <th>{{$houseData->property_type}}</th>
                <th>{{$houseData->created_at}}</th>
            </tr>
             @endforeach
          </tbody>
      </table>
      <div>
        {{$data->links()}}
      </div>
  </main>
@endsection
