@extends('users.layout')
@section('title', 'Rent House Page')
<!-- Favicons -->
<link href="{{ asset('user/img/1H5TLj-LogoMakr-removebg-preview.png') }}" rel="icon">
@section('content')
<nav style="--bs-breadcrumb-divider: '>'; margin-top: 100px" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active text-primary" aria-current="page">RENT</li>
    </ol>
</nav>
      <div class="row g-4">
        @foreach ($data as $houseData)
            <div class="col-lg-4 col-md-6 wow fadeInUp ms-5" data-wow-delay="0.1s">
                <div class="property-item rounded overflow-hidden">
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            @if ($houseData->id == $houseData->houseId)
                                @foreach (explode(',', $houseData->houseImg) as $image)
                                    <div class="carousel-item active">
                                        <img src="{{ asset('storage/house/' . $image) }}" class="d-block w-100"
                                            alt="...">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="p-4 pb-0">
                        @if ($houseData->type == 'SALE')
                           <a href="{{route('sale')}}">
                            <button class="btn btn-danger rounded mb-2">
                                {{ $houseData->type }}
                            </button>
                           </a>
                        @else
                            <a href="{{route('rent')}}">
                                <button class="btn btn-warning rounded mb-2">
                                    {{ $houseData->type }}
                                </button>
                            </a>
                        @endif
                        {{-- input hidden --}}
                        <input type="hidden" id="unlikeId" value="{{ $houseData->id }}">
                        @if ($houseData->id == $houseData->houseId)
                            <input type="hidden" id="image" value="{{ $houseData->houseImg }}">
                        @endif
                        @if (Auth::user())
                        @if (Auth::user()->role == 'user')
                        @if (Auth::user()->id == $houseData->user_id)
                        <a href="{{route('dislike',$houseData->id)}}" >
                            <i class='fas fa-heart text-danger fs-4'></i>
                          </a>
                        @elseif ($houseData->user_id == 0)
                        <a href="{{route('like',$houseData->id)}}">
                            <i class='far fa-heart fs-4'></i>
                          </a>
                          @else
                          <a href="{{route('like',$houseData->id)}}">
                            <i class='far fa-heart fs-4'></i>
                          </a>
                        @endif
                        @endif
                        @endif
                        <a href="{{ route('house.detail', $houseData->id) }}">
                            <button class="btn btn-success float-end">
                                Detail
                            </button>
                        </a>
                        <h5 class="text-primary mb-3">{{ $houseData->housePrice }}</h5>
                        <h5 class="text-primary">{{ $houseData->title }}</h5>
                        <h5 class="text-secondary">
                            <i class="fa-solid fa-location-dot text-warning like"></i>
                            {{ $houseData->location }}
                        </h5>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i
                                class="fa fa-ruler-combined text-primary me-2"></i>{{ $houseData->sqft }}
                            Sqft</small>
                        <small class="flex-fill text-center border-end py-2"><i
                                class="fa fa-bed text-primary me-2"></i>{{ $houseData->bedrooms }}</small>
                        <small class="flex-fill text-center py-2"><i
                                class="fa fa-bath text-primary me-2"></i>{{ $houseData->bathrooms }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div>
        {{$data->links()}}
      </div>
@endsection
