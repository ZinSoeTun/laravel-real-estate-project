@extends('admin.layout')
@section('title', 'Admin List Page')
@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Account</li>
            <li class="breadcrumb-item active text-primary" aria-current="page">Admin List</li>
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
        {{-- admin list --}}
        <h1>Admin List - {{ count($data) }}</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Admin Name</th>
                    <th>Admin Email</th>
                    <th>Registered Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $adminData)
                    <tr>
                        <th>{{ $adminData->id }}</th>
                        <th>{{ $adminData->name }}</th>
                        <th>{{ $adminData->email }}</th>
                        <th>{{ $adminData->created_at }}</th>
                        <th>
                            <a href="{{ route('admin.adminList.detail', $adminData->id) }}">
                                <button class="btn btn-warning me-2">
                                    Detail
                                </button>
                            </a>
                            @if (Auth::user()->id !== $adminData->id)
                                <a href="{{ route('admin.adminList.delete', $adminData->id) }}">
                                    <button class="btn btn-danger">
                                        Delete
                                    </button>
                                </a>
                            @endif
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
