@extends('admin.layout')
@section('title', 'Edit House Detail Page')
@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Overview</li>
            <li class="breadcrumb-item">List</li>
            <li class="breadcrumb-item active text-primary" aria-current="page">Edit House Detail</li>
        </ol>
    </nav>
    <main>
        {{--- success message --}}
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
                    <div style="color: white" class="alert alert-light bg-danger text-center alert-dismissible fade show"
                        role="alert">
                        <i
                            class=" bg-danger fa-solid fa-circle-exclamation me-3"></i><strong>{{ session('error') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        {{-- house edit  --}}
        <div class="container-fluid">
            <div class="col-lg-6 offset-lg-3 row">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center">Edit House Overview Detail</h3>
                        </div>
                        {{-- horizontal line --}}
                        <br>
                        {{-- house overview edit form --}}
                        <form action="{{route('admin.houses.overview.edit', $houseDetail->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- title --}}
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Title:</label>
                                <input type="text" name="title"
                                    class="form-control @error('title')  is-invalid @enderror" placeholder="title..."
                                    value="{{old('title',  $houseDetail->title)}}">
                                @error('title')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- type --}}
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Type:</label>
                                <input type="text" name="type"
                                    class="form-control @error('type')  is-invalid @enderror" placeholder="type..."
                                    value="{{ old('type',  $houseDetail->type) }}">
                                @error('type')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- location --}}
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Location:</label>
                                <input type="text" name="location"
                                    class="form-control @error('location')  is-invalid @enderror" placeholder="location..."
                                    value="{{ old('location',  $houseDetail->location) }}">
                                @error('location')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- discover --}}
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Discover:</label>
                                <input type="text" name="discover"
                                    class="form-control @error('discover')  is-invalid @enderror" placeholder="discover..."
                                    value="{{ old('discover',  $houseDetail->discover) }}">
                                @error('discover')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- bedroom --}}
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Bedroom:</label>
                                <input type="text" name="bedroom"
                                    class="form-control @error('bedroom')  is-invalid @enderror" placeholder="bedroom..."
                                    value="{{ old('bedroom',  $houseDetail->bedrooms) }}">
                                @error('bedroom')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- bathroom --}}
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Bathroom:</label>
                                <input type="text" name="bathroom"
                                    class="form-control @error('bathroom')  is-invalid @enderror" placeholder="bathroom..."
                                    value="{{ old('bathroom', $houseDetail->bathrooms) }}">
                                @error('bathroom')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- sqft --}}
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Area:</label>
                                <input type="text" name="sqft"
                                    class="form-control @error('sqft')  is-invalid @enderror" placeholder="sqft..."
                                    value="{{ old('sqft',$houseDetail->sqft) }}">
                                @error('sqft')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- garage --}}
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Garage:</label>
                                <input type="text" name="garage"
                                    class="form-control @error('garage')  is-invalid @enderror" placeholder="garage..."
                                    value="{{ old('garage',$houseDetail->garages) }}">
                                @error('garage')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- agent --}}
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Agent:</label>
                                <select class="form-select @error('agentId')  is-invalid @enderror"
                                    aria-label="Default select example" name="agentId">
                                    <option value="">Choose Agent</option>
                                    @foreach ($agent as $agent)
                                        <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                    @endforeach
                                </select>
                                @error('agentId')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- house  --}}
                            <div class="form-group mb-3">
                                <label for="" class="form-label">House Type:</label>
                                <select class="form-select @error('houseId')  is-invalid @enderror"
                                    aria-label="Default select example" name="houseId">
                                    <option value="">Choose House Type</option>
                                    @foreach ($house as $house)
                                        <option value="{{ $house->id }}">{{ $house->property_type }}</option>
                                    @endforeach
                                </select>
                                @error('houseId')
                                    <div class="text-danger">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- house description --}}
                            <div class="form-group mb-3">
                                <label for="" class="form-label"> House Description:</label>
                                <textarea class="form-control  @error('houseDescription')  is-invalid @enderror" name="houseDescription"
                                    id="houseDescription" cols="30" rows="3">
                                {{ old('houseDescription',$houseDetail->description) }}
                            </textarea>
                                @error('houseDescription')
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
                            value="{{ old('price',$houseImg->price ) }}">
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
                            {{-- button for card --}}
                            <div class="text-center">
                                <input type="submit" value="Save Change" class="btn btn-success px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
