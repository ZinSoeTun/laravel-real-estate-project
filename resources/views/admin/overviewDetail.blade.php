@extends('admin.layout')
@section('title', 'House Detail Page')
<style>
      pre {
        overflow-x: auto;
        white-space: pre-wrap;
        white-space: -moz-pre-wrap;
        white-space: -pre-wrap;
        white-space: -o-pre-wrap;
        word-wrap: break-word;
      }
</style>
@section('content')
 <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Overview</li>
              <li class="breadcrumb-item" aria-current="page"> List</li>
              <li class="breadcrumb-item active text-primary" aria-current="page">House Overview Detail</li>
            </ol>
        </nav>
    <main>
           {{-- for title --}}
           <h2>{{$houseDetail->title}}</h2>
           {{-- for type --}}
           @if ($houseDetail->type == 'SALE')
            <a href="{{route('sale')}}">
             <button class="btn btn-danger rounded mb-2">
                 {{$houseDetail->type}}
             </button>
            </a>
           @else
            <a href="{{route('rent')}}">
             <button class="btn btn-warning rounded mb-2">
                 {{$houseDetail->type}}
             </button>
            </a>
           @endif
           {{-- for location --}}
           <h5 class="text-secondary">
             <i class="fa-solid fa-location-dot text-warning"></i>
                         {{$houseDetail->location}}
                     </h5>
           {{-- for image --}}
             <div id="carouselExample" class="carousel slide">
                 <div class="carousel-inner">
                     @foreach (explode(",",$houseImg->image) as $key => $value)
                     <div class="carousel-item active">
                         <img src="{{asset('storage/house/'.$value)}}" class="d-block w-100" alt="...">
                       </div>
                     @endforeach
                 </div>
                 <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                   <span class="visually-hidden">Previous</span>
                 </button>
                 <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                   <span class="carousel-control-next-icon" aria-hidden="true"></span>
                   <span class="visually-hidden">Next</span>
                 </button>
               </div>
             </div>
             {{-- for overview --}}
             <div class="mx-auto my-4" style="width: 85%">
                 <div class="fs-4 ms-5 text-primary">Overview</div>
             </div>
             <div class="text-center mx-auto row my-4" style="width: 85%">
                 {{--for  property type --}}
                 <div  class="ms-2 mb-3 col-12 col-md-2">
                     <i class="fa-solid fa-house"></i>
                     {{$houseProperty->property_type}}
                    <div>
                     Property Type
                    </div>
                 </div>
                 {{-- for bedroom --}}
                 <div  class="ms-2 mb-3 col-12 col-md-2">
                     <i class="fa-solid fa-bed"></i>
                     {{$houseDetail->bedrooms}}
                    <div>
                     Bedrooms
                    </div>
                 </div>
                 {{-- for bathroom --}}
                 <div  class="ms-2 mb-3 col-12 col-md-2">
                     <i class="fa-solid fa-bath"></i>
                     {{$houseDetail->bathrooms}}
                    <div>
                     Bathrooms
                    </div>
                 </div>
                  {{-- for garage --}}
                  <div  class="ms-2 mb-3 col-12 col-md-2">
                     <i class="fa-solid fa-warehouse"></i>
                     {{$houseDetail->garages}}
                    <div>
                     Garages
                    </div>
                 </div>
                 {{-- for sqft --}}
                 <div  class="ms-2 mb-3 col-12 col-md-2">
                     <i class="fa-solid fa-chart-area"></i>
                     {{$houseDetail->sqft}}
                    <div>
                     Sqft
                    </div>
                 </div>
             </div>
     <div class="container-xxl py-5">
         <div class="container">
             <div class="row g-5 d-flex">
                   {{-- for description --}}
                 <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                     <div class="fs-4 text-primary">Description</div>
                 <pre class="fs-5">
                       {{$houseDetail->description}}<br>
                 </pre>
                 </div>
                   {{-- for image --}}
                 <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                     <div id="carouselExample" class="carousel slide mb-3">
                         <div class="carousel-inner">
                             @foreach (explode(",",$houseImg->image) as $key => $value)
                             <div class="carousel-item active">
                                 <img src="{{asset('storage/house/'.$value)}}" class="d-block w-100" alt="...">
                               </div>
                             @endforeach
                         </div>
                         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                           <span class="visually-hidden">Previous</span>
                         </button>
                         <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                           <span class="carousel-control-next-icon" aria-hidden="true"></span>
                           <span class="visually-hidden">Next</span>
                         </button>
                       </div>
                         {{-- agent that will contact--}}
                       <h2 class="text-center text-secondary mb-3">The agent you will contact</h2>
                       <div class="card mx-auto shadow" style="width: 20rem;">
                         <div class=" img-fluid img-thumbnail">
                             <img src="{{asset('storage/agent/'.$agent->image)}}" class="card-img-top" alt="..." width="150" height="150">
                         </div>
                         <div class="card-body text-center">
                                <h5 class="card-title text-danger">Name</h5>
                                <h5>{{$agent->name}}</h5>
                                <h5 class="card-title text-danger">Email</h5>
                                <h5>{{$agent->email}}</h5>
                                <h5 class="card-title text-danger">Phone</h5>
                                <h5>{{$agent->phone}}</h5>
                                <h5 class="card-title text-danger">Citizen</h5>
                                <h5>{{$agent->citizen}}</h5>
                         </div>
                       </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     @if (session('success'))
     <div class="alert text-center alert-success alert-dismissible fade show" role="alert">
         <strong>{{session('success')}}</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
     @endif
    </main>
    @endsection
