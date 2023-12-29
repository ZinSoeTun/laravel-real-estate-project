<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title')</title>
    @yield('csrf')
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('home/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('home/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet">

    {{-- font aweson cdn link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- bootstrap css cdn link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('user/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/bootstrap-icons/bootstrap-icons.css') }}"rel="stylesheet">
    <link href="{{ asset('user/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/remixicon/remixicon.css') }}"rel="stylesheet">
    <link href="{{ asset('user/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-transparent">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                <div class="icon p-2 me-2">
                    <img src="{{ asset('user/img/1H5TLj-LogoMakr-removebg-preview.png') }}" alt=""
                        style="width: 30px; height: 30px;">
                </div>
                <h1 class="m-0 text-primary">King Of The King</h1>
            </a>
            <button type="button" class="navbar-toggler" id="hamburger">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse pb-3">
                <div class="navbar-nav ms-auto">
                    <a href="/#home" class="nav-item nav-link">Home</a>
                    <a href="/#about" class="nav-item nav-link">About</a>
                    <a href="/#service" class="nav-item nav-link">Service</a>
                    <div class="nav-item dropdown">
                        <a href="" class="nav-link " data-bs-toggle="dropdown">Account</a>
                        <div class="dropdown-menu rounded-2 m-0 p-0">
                            @if (!Auth::user())
                                <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                                    <a href="{{ route('login') }}" class="dropdown-item">Log in</a>
                            @else
                            @if (Auth::user()->role == 'user')
                            <a href="{{ route('user.profile') }}" class="dropdown-item me-4">Account Profile
                                <i class="fa-solid fa-user-gear pe-5 float-end"></i></a>
                                <form action="{{ route('logout') }}" method="post" class="me-4">
                                    @csrf
                                    <a href="">
                                        <input style="border-radius: 4px; color:white" class=" btn btn-success me-5"
                                            type="submit" value="Log Out"><i
                                            class="fa-solid fa-right-from-bracket pe-4"></i>
                                    </a>
                                </form>
                            @else
                            <a href="{{route('admin.dashboard')}}">
                                 Admin Dashboard
                                <i
                                    class="fa-solid fa-right-from-bracket pe-4"></i>
                            </a>
                        <form action="{{ route('logout') }}" method="post" class="me-4">
                            @csrf
                            <a href="">
                                <input style="border-radius: 4px; color:white" class=" btn btn-success me-5"
                                    type="submit" value="Log Out"><i
                                    class="fa-solid fa-right-from-bracket pe-1"></i>
                            </a>
                        </form>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
                <a class="getstarted scrollto" href="#">Get Started</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
    @yield('content')
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <img src="{{ asset('user/img/1H5TLj-LogoMakr-removebg-preview.png') }}" alt="">
                            <span>King Of The King</span>
                        </a>
                        <p class="fs-5">King Of The King Real Estate offers Agency and Brokerage services from
                            landlords and
                            occupiers, institutional or corporate investors, and developers to local or central
                            government authorities.</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bi bi-twitter text-primary"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook text-primary"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram text-danger"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin text-primary"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>King of the king</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="/#home">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="/#about">About us</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="/#service">Services</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="/#value">Our Value</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="/#agent">Our Agents</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Property Type</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('apartment') }}">Apartment</a>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('villa') }}">Villa</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('townhouse') }}">Townhouse</a>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('penthouse') }}">Penhouse</a>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('retail') }}">Retail</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Contact Us</h4>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>King Of The King</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="/#home">King Of The King</a>
            </div>
        </div>
    </footer><!-- End Footer -->


</body>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
{{-- jquery code for hamburger menu --}}
<script>
    $(document).ready(function() {
        $('#hamburger').click(function() {
            if ($('.navbar-collapse').is(':hidden')) {
                $('.navbar-collapse').show(1000);
            } else {
                $('.navbar-collapse').hide(1000);
            }
        });
    });
</script>

<!-- Vendor JS Files -->
<script src="{{ asset('user/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('user/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('user/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('user/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('user/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('user/vendor/php-email-form/validate.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<!-- Template Main JS File -->
<script src="{{ asset('user/js/main.js') }}"></script>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('home/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('home/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('home/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('home/lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('home/js/main.js') }}"></script>

</html>
