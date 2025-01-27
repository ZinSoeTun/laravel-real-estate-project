@extends('users.layout')
@section('title', 'Home Page')
<!-- Favicons -->
<link href="{{ asset('user/img/1H5TLj-LogoMakr-removebg-preview.png') }}" rel="icon">
{{-- csrf token --}}
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
{{-- jquery link --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
@section('content')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0" id="home">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Find A <span class="text-primary">Perfect Home</span> To Live With
                    Your Family</h1>
                <p class="animated fadeIn mb-4 pb-2">Searching for your ideal home or commercial property in the
                    world shouldn't be a
                    daunting experience. That's why we're here to assist you in finding the perfect property at the
                    right price</p>
                <a href="" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get Started</a>
            </div>
            <div class="col-md-6 animated fadeIn">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="{{ asset('home/img/carousel-1.jpg') }}" alt="">
                    </div>
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="{{ asset('home/img/carousel-2.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->



    <!-- Search Start -->
    <h1 class="text-center text-primary mt-5"><b>Discover your place to live</b></h1>
    <h3 class="text-center text-primary mb-4"><b> Get started in few clicks</b></h3>
    <div class="container-fluid bg-secondary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
         <form action="{{route('search')}}" method="post">
            @csrf
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-3">
                               <input type="text" class=" form-control border-0 py-3" name="discover" id="" placeholder="Find the location...">
                            </div>
                            <div class="col-md-3">
                                <select class="form-select border-0 py-3" name="bedroom">
                                    <option selected>Bedroom</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select border-0 py-3" name="property">
                                    <option selected>Property Type</option>
                                    <option value="1">Apartment</option>
                                    <option value="2">Villa</option>
                                    <option value="3">Townhouse</option>
                                    <option value="4">Penthouse</option>
                                    <option value="5">Retail</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select border-0 py-3" name="type">
                                    <option selected>Type</option>
                                    <option value="SALE">SALE</option>
                                    <option value="RENT">RENT</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark border-0 w-100 py-3" type="submit">Search</button>
                    </div>
                </div>
            </div>
         </form>
    </div>
    <!-- Search End -->

    {{-- success message --}}
    @if (session('success'))
        <div class="alert text-center alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- error message --}}
    @if (session('error'))
        <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Property List Start -->
    <div class="container-xxl py-5 parent">
        <div class="tab-content">
            <div class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    @foreach ($data as $houseData)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
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
                                    <h5 class="text-primary mb-3">$ {{ $houseData->housePrice }}</h5>
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
            </div>
        </div>
    </div>
    </div>
    <div class="paginate ms-5 me-5 fs-5">
        {{ $data->links() }}
    </div>
    <!-- Property List End -->

    <!-- About Start -->
    <div class="container-xxl py-5" id="about">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="{{ asset('home/img/about.jpg') }}">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="fs-1 text-primary">Who We Are</h1>
                    <p class="fs-5">
                        King Of The King Real Estate was founded by a highly experienced group of realtors in
                        Dubai
                        specializing in all facets of the real estate business. Combined with over 20 years of
                        experience, knowledge of the Dubai market, and superior negotiating training; King Of
                        THe
                        King
                        Real Estate is the perfect choice for representing you in all your real estate
                        transactions.
                        We are an organized team that is dedicated to providing the highest quality of service
                        using
                        our understanding of each individual area as well as our clientele needs. Our main focus
                        is
                        the customer journey in day-to-day management and our services are tailored to each
                        client.
                        We dedicate our special attention to unique needs and requirements to help hundreds of
                        clients realize their homeownership goals, business setup, and return on investments.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Service section start -->
    <div class="container-xxl py-5" id="service">
        <div class="container">
            <h2 class="text-center fs-4 text-primary">Our Service</h2>
            <p class="text-center fs-5 text-primary">Welcome to King Of The King Real Estate</p>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden p-3 d-flex">
                                <i class="fa-solid fa-handshake fs-1 me-2"></i>
                                <div>
                                    <h3>Agency & Brokerage Services</h3>
                                    <p>King Of The King Real Estate offers Agency and Brokerage services from landlords and
                                        occupiers, institutional or corporate investors, and developers to local or central
                                        government authorities.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="property-item rounded overflow-hidden p-3 d-flex">
                                <i class="fa-solid fa-coins fs-1 me-2"></i>
                                <div>
                                    <h3>Financial Reporting</h3>
                                    <p>Such interactive media is then promoted via our marketing channels; ranging from
                                        Google
                                        AdWords, Social Media, “smartly reached” newsletters, and our prominent online
                                        platform
                                        on all trusted portals in the region.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="property-item rounded overflow-hidden p-3 d-flex">
                                <i class="fa-brands fa-servicestack fs-1 me-2"></i>
                                <div>
                                    <h3>Valuation & Advisory Services</h3>
                                    <p>Our Valuation professionals are widely recognized for providing the most
                                        sophisticated
                                        advice on the current and projected value of the real estate and real estate-related
                                        investments.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden d-flex p-3">
                                <i class="fa-solid fa-people-group fs-1 me-2"></i>
                                <div>
                                    <h3>Property Management</h3>
                                    <p>Covers a full management package and tenancy application. Live a hassle-free year
                                        while
                                        reaping the benefits of the investment.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="property-item rounded overflow-hidden p-3 d-flex">
                                <i class="fa-solid fa-circle-dollar-to-slot fs-1 me-2"></i>
                                <div>
                                    <h3>Detailed Pricing Strategy</h3>
                                    <p>The traditional market norm of “Average Pricing” consistently results in overpriced
                                        units
                                        remaining vacant while underpriced ones are unable to generate their optimum ROI.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="property-item rounded overflow-hidden d-flex p-3">
                                <i class="fa-solid fa-magnifying-glass fs-1 me-2"></i>
                                <div>
                                    <h3>Property Market Research</h3>
                                    <p>The Market Research Department of king of the king Real Estate is closely monitoring
                                        the
                                        property market, keeping in touch with the prevailing conditions and identifying
                                        trends.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service section end -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5" id="value">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Our Clients Say!</h1>
                <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod
                    sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam
                            stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('home/img/testimonial-1.jpg') }}"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam
                            stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('home/img/testimonial-2.jpg') }}"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam
                            stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('home/img/testimonial-3.jpg') }}"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- agent Start -->
    <div class="container-xxl py-5" id="agent">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Our Agents</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($agentData as $agent)
                    <div class="card mx-auto shadow" style="width: 20rem;">
                        <div class=" img-fluid img-thumbnail">
                            <img src="{{ asset('storage/agent/' . $agent->image) }}" class="card-img-top" alt="..."
                                width="150" height="150">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title text-danger">Name</h5>
                            <h5>{{ $agent->name }}</h5>
                            <h5 class="card-title text-danger">Email</h5>
                            <h5>{{ $agent->email }}</h5>
                            <h5 class="card-title text-danger">Phone</h5>
                            <h5>{{ $agent->phone }}</h5>
                            <h5 class="card-title text-danger">Citizen</h5>
                            <h5>{{ $agent->citizen }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Agent End -->



@endsection
