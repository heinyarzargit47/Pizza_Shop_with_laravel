@extends('user.customerLayout')
@section('content')
    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">

                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>

                                    <th colspan="3">Quantity</th>

                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="shoppingcart_table">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row float-end">

                @csrf
                <div class="col col-lg-3 col-md-6 mt-3 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">

                        <p class="d-flex total-price" style="font-weight: bold;">
                            <span>Total&emsp;&emsp;</span>
                            <span id="alltotal"></span><i>&nbsp;Ks</i>
                        </p>

                    </div>

@if(Auth::check())
                    <button class="btn btn-secondary buy_now" style="width: 2in">
                        Proceed Check Out
                    </button>

@else
                    <a href="{{route('login')}}" class="btn btn-secondary btn-block mainfullbtncolor "style="width: 2in">
                           Login To Check Out
                       </a>
                    @endif
                </div>

            </div>
        </div>
    </section>
@endsection
