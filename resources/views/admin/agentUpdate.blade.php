@extends('admin.layout')
@section('title', 'Edit Agent Page')
@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Agent</li>
      <li class="breadcrumb-item">List</li>
      <li class="breadcrumb-item active text-primary" aria-current="page">Edit Agent</li>
    </ol>
  </nav>
  <main>
       {{-- agent edit --}}
       <div class="container-fluid">
        <div class="col-lg-6 offset-lg-3">
              {{-- success message --}}
    <div style="width: 500px;" class="text-success mx-2 mx-auto">
        @if (session('success'))
            <div style="color: white" class="alert alert-light bg-success text-center alert-dismissible fade show" role="alert">
                <i class=" bg-danger fa-solid fa-circle-exclamation me-3"></i><strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center">Update Agent</h3>
                    </div>
                    {{-- horizontal line --}}
                    <br>
                    {{-- agent edit form --}}
                    <form action="{{route('admin.agent.update', $data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- agent name --}}
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Agent Name:</label>
                            <input type="text" name="agentName"
                                class="form-control @error('agentName')  is-invalid @enderror"
                                placeholder="agent name" value="{{ old('agentName', $data->name) }}">
                            @error('agentName')
                                <div class="text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- agent email --}}
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Agent Email:</label>
                            <input type="text" name="agentEmail"
                                class="form-control @error('agentEmail')  is-invalid @enderror"
                                placeholder="agent email" value="{{ old('agentEmail',$data->email) }}">
                            @error('agentEmail')
                                <div class="text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                           {{-- agent phone mumber--}}
                           <div class="form-group mb-3">
                            <label for="" class="form-label">Agent Phone Number:</label>
                            <input type="text" name="agentPhone"
                                class="form-control @error('agentPhone')  is-invalid @enderror"
                                placeholder="agent phone mumber" value="{{ old('agentPhone',$data->phone) }}">
                            @error('agentPhone')
                                <div class="text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                           {{-- agent address --}}
                           <div class="form-group mb-3">
                            <label for="" class="form-label">Agent Address:</label>
                            <input type="text" name="agentAddress"
                                class="form-control @error('agentAddress')  is-invalid @enderror"
                                placeholder="agent address" value="{{ old('agentAddress',$data->address) }}">
                            @error('agentAddress')
                                <div class="text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                          {{-- agent language--}}
                          <div class="form-group mb-3">
                            <label for="" class="form-label">Language:</label>
                            <input type="text" name="language"
                                class="form-control @error('language')  is-invalid @enderror"
                                placeholder="agent can speak language" value="{{ old('language',$data->language) }}">
                            @error('language')
                                <div class="text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                          {{-- citizen --}}
                          <div class="form-group mb-3">
                            <label for="" class="form-label">Citizen:</label>
                            <input type="text" name="citizen"
                                class="form-control @error('citizen')  is-invalid @enderror"
                                placeholder="citizen" value="{{ old('agcitizen',$data->citizen) }}">
                            @error('agcitizen')
                                <div class="text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- agent image --}}
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Agent Image:</label>
                            <input type="file" name="agentImage"
                                class="form-control @error('agentImage')  is-invalid @enderror">
                            @error('agentImage')
                                <div class="text-danger">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- button for edit agent --}}
                        <div class="text-center">
                            <input type="submit" value="update" class="btn btn-success px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </main>
@endsection
