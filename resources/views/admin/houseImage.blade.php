@extends('admin.layout')
@section('title', 'Create House Image Page')
@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Overview</li>
      <li class="breadcrumb-item active text-primary" aria-current="page">Create House Image</li>
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
       {{-- house Image create --}}
       <div class="container-fluid">
        <div class="col-lg-6 offset-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center">Create House Image</h3>
                    </div>
                    {{-- horizontal line --}}
                    <br>
                    <form action="{{route('admin.houses.overviewCreate.houseImg')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- house detail ID--}}
                        <div class="form-group mb-3">
                         <label for="" class="form-label">Overview ID:</label>
                         <select class="form-select @error('overviewId')  is-invalid @enderror"
                             aria-label="Default select example" name="overviewId">
                             <option value="">Choose Overview ID</option>
                             @foreach ($data as $overview)
                             <option value="{{ $overview->id }}">{{ $overview->id }}</option>
                         @endforeach
                         </select>
                         @error('overviewId')
                             <div class="text-danger">
                                 *{{ $message }}
                             </div>
                         @enderror
                     </div>
                      {{-- price --}}
                      <div class="form-group mb-3">
                        <label for="" class="form-label">Price:</label>
                        <input type="text" name="price"
                            class="form-control @error('price')  is-invalid @enderror" placeholder="price..."
                            value="{{ old('price') }}">
                        @error('price')
                            <div class="text-danger">
                                *{{ $message }}
                            </div>
                        @enderror
                    </div>
                        {{-- house image --}}
                        <div class="form-group mb-3">
                         <label for="" class="form-label">House Image:</label>
                         <input type="file" name="houseImg[]"
                             class="form-control @error('houseImg')  is-invalid @enderror" multiple>
                         @error('houseImg')
                             <div class="text-danger">
                                 *{{ $message }}
                             </div>
                         @enderror
                         </div>
                            {{-- button for house image create --}}
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
