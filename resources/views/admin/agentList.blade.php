@extends('admin.layout')
@section('title', 'Agent List Page')
@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Agent</li>
      <li class="breadcrumb-item active text-primary" aria-current="page">Agent List</li>
    </ol>
  </nav>
    <main>
        {{-- success message --}}
        <div style="width: 500px;" class="text-success mx-2 mx-auto">
            @if (session('success'))
                <div style="color: white" class="alert alert-light bg-success text-center alert-dismissible fade show"
                    role="alert">
                    <i class=" bg-danger fa-solid fa-circle-exclamation me-3"></i><strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        {{-- agent list --}}
        <h1>Agent List - {{ count($data) }}</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Agent Name</th>
                    <th>Agent Email</th>
                    <th>Registered Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $agentData)
                    <tr>
                        <th>{{ $agentData->id }}</th>
                        <th>{{ $agentData->name }}</th>
                        <th>{{ $agentData->email }}</th>
                        <th>{{ $agentData->created_at }}</th>
                        <th>
                            <a href="{{route('admin.agentList.detail', $agentData->id )}}">
                                <button class="btn btn-success me-2">
                                    Detail
                                </button>
                            </a>
                            <a href="{{route('admin.agent.updatePage', $agentData->id )}}">
                                <button class="btn btn-warning me-2">
                                    Edit
                                </button>
                            </a>
                                <a href="{{route('admin.agent.delete', $agentData->id )}}">
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
            {{ $data->links() }}
        </div>
    </main>
@endsection


