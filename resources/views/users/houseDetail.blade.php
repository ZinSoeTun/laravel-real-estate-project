@extends('users.layout')
@section('title', 'House Detail Page')
<!-- Favicons -->
<link href="{{ asset('user/img/1H5TLj-LogoMakr-removebg-preview.png') }}" rel="icon">
{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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
    <div class="main">
         <div class="mx-auto" style="width: 85%">
            <nav style="--bs-breadcrumb-divider: '>'; margin-top: 100px" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">{{$houseProperty->property_type}}</li>
                    <li class="breadcrumb-item active text-primary" aria-current="page">{{$houseDetail->title}}</li>
                </ol>
            </nav>
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
                        {{-- for contact the--}}
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
    <h2 class="text-center text-primary contact">Contact Form</h2>
    <form class="row  w-75 mx-auto shadow border-2 p-4" id="contact" action="{{route('contact')}}" method="POST">
        @csrf
        <div class="col-md-6">
          <label for="name" class="form-label">Name</label>
          <input type="name" class="form-control  @error('name')is-invalid @enderror" id="name"
               name="name">
          @error('name')
          <div class="text-danger">*{{ $message }}</div>
      @enderror
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control @error('email')is-invalid @enderror" id="email"
            name="email">
          @error('email')
          <div class="text-danger">*{{ $message }}</div>
      @enderror
        </div>
        <div class="col-md-6">
          <label for="phone" class="form-label">Phone</label>
          <input type="text" class="form-control @error('phone')is-invalid @enderror" id="phone"
             name="phone">
          @error('phone')
          <div class="text-danger">*{{ $message }}</div>
      @enderror
        </div>
        <div class="col-md-6">
            <label for="agent" class="form-label">Agent</label>
            <input type="text" class="form-control" id="agent"
                    disabled  name="agent" value="{{$agent->name}}">
                     <input type="hidden" class="form-control" id="agent"
                     name="agent" value="{{$agent->name}}">
          </div>
        <div>
            <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control @error('address')is-invalid @enderror" id="phone"
                   name="address">
                @error('address')
                <div class="text-danger">*{{ $message }}</div>
            @enderror
              </div>
              <div class="col-md-6">
                <label for="citizen" class="form-label">Citizen</label>
                <input type="text" class="form-control @error('citizen')is-invalid @enderror" id="phone"
                   name="citizen">
                @error('citizen')
                <div class="text-danger">*{{ $message }}</div>
            @enderror
              </div>
            <label for="inputAddress" class="form-label">Message</label>
           <textarea name="message" class="form-control" id="" cols="110" rows="5"> Hello, I am interested in [{{$houseDetail->title}}]
           </textarea>
        </div>
          <div class="d-flex m-3">
            <div class="me-2 RI">
                <button class="btn btn-primary" type="button">Request Information</button>
              </div>
              <div>
                  <button type="submit" class="btn btn-primary" href="/#contact">Send Message</button>
                </div>
          </div>
      </form>


      <script>
        $(document).ready(function(){
       $('.RI').click(function () {
        $('.hello').remove();
            $('form').append(`
            <div class="alert text-center alert-primary alert-dismissible fade show hello" role="alert">
        <p>We will send the information to your email soon</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
            `)
        });
      });

   </script>
@endsection
