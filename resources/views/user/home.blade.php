@extends('user.customerLayout')
@section('content')
    <!-- Page Content-->
    <div class="container px-4 px-lg-5" id="home">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-6"><img class="img-fluid rounded mb-4 mb-lg-0" id="code-lab-pizza"
                    src="https://www.pizzamarumyanmar.com/wp-content/uploads/2019/04/chigago.jpg" alt="..." /></div>
            <div class="col-lg-5">
                <h1 class="font-weight-light">Pizza Shop</h1>
                <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it
                    makes a great use of the standard Bootstrap core components. Feel free to use this template for any
                    project you want!</p>
                <a class="btn btn-primary" href="#!">Enjoy!</a>
            </div>
        </div>

        <!-- Content Row-->
        <div class="d-flex justify-content-around" id="pizzaOne">
            <div class="mt-4 col-3 col-sm-3 col-lg-3 col-md-3 col-xl-3 me-5" style="background-color: #C0C0C0;height:3in;width:auto">
                <div class="">
                    <div class="py-3">
                        {{-- <form class="d-flex m-5">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-dark" type="submit">Search</button>
                        </form> --}}

                        <div class="">
                            <a href="{{ route('user#pizzaList') }}" class="text-decoration-none" title="Filter By Category">
                                <div class="m-2 p-2 text-center" style="background-color:  #eaeef1" >All</div>
                            </a>
                            @foreach ($allCategory as $categories)
                                <a href="{{ route('user#searchWithCategory', $categories->category_id) }}"
                                    class="text-decoration-none" title="Filter By&nbsp;{{ $categories->category_name }} ">
                                    <div class="m-2 py-2 px-5 text-black">{{ $categories->category_name }}</div>
                                </a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 w-100">
                <div class="row" id="pizza">
                    @foreach ($pizzaList as $pizzas)
                        <div class="col-12 col-sm-12 col-xl-4 col-lg-6 col-md-6 mb-5">
                            <div class="card h-100">


                                @if ($pizzas->by_one_get_one_status == 1)
                                    <div class="badge bg-primary text-white position-absolute"
                                        style="top: 0.5rem; right: 0.5rem">By One Get One</div>
                                @endif


                                <div><img class="card-img-top" src="{{ asset('images/' . $pizzas->image) }}" height="200px"
                                        alt="..." /></div>
                                <div class="card-body p-4">
                                    <div class="text-center">

                                        <h5 class="fw-bolder">{{ $pizzas->pizza_name }}</h5>

                                        @if ($pizzas->discount_price != 0)
                                            <span
                                                class="text-muted text-decoration-line-through">{{ $pizzas->price }}</span>&nbsp;&nbsp;{{ $pizzas->price - $pizzas->discount_price }}&nbsp;Ks
                                        @else
                                            <span>{{ $pizzas->price }}&nbsp;Ks</span>
                                        @endif

                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><button class="addtocart" data-id="{{ $pizzas->pizza_id }}"
                                            data-name="{{ $pizzas->pizza_name }}"
                                            data-price="{{ $pizzas->price - $pizzas->discount_price }}"
                                            data-image="{{ $pizzas->image }}">Add To Cart</button></div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>

        <div class="mt-5">
            <div class="" style="width: 2.5in;background-color: #C0C0C0;"><h3>Promotion Pizzas</h3></div><hr>
            <div>

                <div class="row" id="pizza">
                    @foreach ($promotionPizza as $pizzas)
                        <div class="col-6 col-sm-6 col-xl-4 col-lg-6 col-md-6 mb-5">
                            <div class="card h-100">


                                @if ($pizzas->by_one_get_one_status == 1)
                                    <div class="badge bg-primary text-white position-absolute"
                                        style="top: 0.5rem; right: 0.5rem">By One Get One</div>
                                @endif


                                <div><img class="card-img-top" src="{{ asset('images/' . $pizzas->image) }}" height="200px"
                                        alt="..." /></div>
                                <div class="card-body p-4">
                                    <div class="text-center">

                                        <h5 class="fw-bolder">{{ $pizzas->pizza_name }}</h5>

                                        @if ($pizzas->discount_price != 0)
                                            <span
                                                class="text-muted text-decoration-line-through">{{ $pizzas->price }}</span>&nbsp;&nbsp;{{ $pizzas->price - $pizzas->discount_price }}&nbsp;Ks
                                        @else
                                            <span>{{ $pizzas->price }}&nbsp;Ks</span>
                                        @endif

                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><button class="addtocart" data-id="{{ $pizzas->pizza_id }}"
                                            data-name="{{ $pizzas->pizza_name }}"
                                            data-price="{{ $pizzas->price - $pizzas->discount_price }}"
                                            data-image="{{ $pizzas->image }}">Add To Cart</button></div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>
        </div>

        <div class="mt-5">
            <div class="" style="width: 2.5in;background-color: #C0C0C0;"><h3>Special Pizzas</h3></div><hr>
            <div>

                <div class="row" id="pizza">
                    @foreach ($specialPizza as $pizzas)
                        <div class="col-6 col-sm-6 col-xl-4 col-lg-6 col-md-6 mb-5">
                            <div class="card h-100">


                                @if ($pizzas->by_one_get_one_status == 1)
                                    <div class="badge bg-primary text-white position-absolute"
                                        style="top: 0.5rem; right: 0.5rem">By One Get One</div>
                                @endif


                                <div><img class="card-img-top" src="{{ asset('images/' . $pizzas->image) }}" height="200px"
                                        alt="..." /></div>
                                <div class="card-body p-4">
                                    <div class="text-center">

                                        <h5 class="fw-bolder">{{ $pizzas->pizza_name }}</h5>

                                        @if ($pizzas->discount_price != 0)
                                            <span
                                                class="text-muted text-decoration-line-through">{{ $pizzas->price }}</span>&nbsp;&nbsp;{{ $pizzas->price - $pizzas->discount_price }}&nbsp;Ks
                                        @else
                                            <span>{{ $pizzas->price }}&nbsp;Ks</span>
                                        @endif

                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><button class="addtocart" data-id="{{ $pizzas->pizza_id }}"
                                            data-name="{{ $pizzas->pizza_name }}"
                                            data-price="{{ $pizzas->price - $pizzas->discount_price }}"
                                            data-image="{{ $pizzas->image }}">Add To Cart</button></div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>
        </div>
    </div>
@endsection
