<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pizza Shop</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('user/css/styles.css')}}" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ asset('user/fontawesome/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{ asset('user/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('user/fontawesome/css/')}}"> --}}


    <style>

    </style>
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container px-5">
            <a class="navbar-brand" href="#!">Pizza Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('user#pizzaList') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item text-white text-muted"><a class="nav-link" href="{{ route('user#shoppingCart')}}">
                        {{-- <a class="nav-link" href="#"><i class="icofont-shopping-cart"></i> <span id="noti" class="text-info" ></span></a> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                          </svg><span id="noti" class="text-info"></span>

                    </a></li>&emsp;


@if(Auth::check())
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
<div class="dropdown-menu" aria-labelledby="dropdown04">
    <a class="dropdown-item" href="#">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <input type="submit" value="Logout">
        </form>
    </a>
</div>

</li>

@else
<li class="nav-item nav-link text-muted" >
    <a class="" href="{{ route('login') }}" style="color: gray;text-decoration:none">Login&nbsp;</a>
    |&nbsp;<a class="" href="{{ route('register') }}" style="color: gray;text-decoration:none">Register</a>
</li>

@endif

                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

    {{-- <div class="text-center mb-1 mt-10">
        @&nbsp;2022&nbsp;Copyright:&emsp;<i style="color: red">PizzaShop.com</i>
    </div> --}}
    <!-- Bootstrap core JS-->
    {{-- <script src="{{ asset('user/fontawesome/js/')}}"></script> --}}
    <script src="{{ asset('user/fontawesome/js/fontawesome.min.js')}}"></script>
    <script src="{{ asset('user/fontawesome/js/fontawesome.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery.min.js')}}"></script>
    <script src="{{ asset('user/js/custom.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('user/js/scripts.js') }}"></script>
</body>

</html>
