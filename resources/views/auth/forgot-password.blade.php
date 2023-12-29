<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password Page</title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('user/img/1H5TLj-LogoMakr-removebg-preview.png') }}" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--  Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!--  botstrap  css cdn link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="text-center my-3">
        <img class="inline-block" src="{{ asset('user/img/1H5TLj-LogoMakr-removebg-preview.png') }}" width="80" height="80"
            alt="logo">
        <h1>Forgot Password Form</h1>
    </div>
    <!--  registration form -->
    <section class="mx-auto" style="width: 500px">
        <form method="POST" style="background-color: rgba(27, 216, 207, 0.596); box-shadow:2px 2px 5px 5px white; border-radius:7px"
            class="p-5" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                Forgot your password? No problem. Just let us know your email address and we will
                 email you a password reset link that will allow you to choose a new one.
            </div>
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control @error('email')is-invalid @enderror" id="email"
                    name="email" placeholder="Enter your email..." value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">*{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex align-center justify-content-end mt-4">
                <button type="submit" class="btn btn-success">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </section>
</body>
<!--  botstrap  js cdn link  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
<script>
</html>




















