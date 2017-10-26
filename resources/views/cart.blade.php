@extends('layouts.app')

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}"/>  

@section('content')

<div class="container cart-products text-center">
    <div class="col-md-5 col-sm-12" style="margin-top: 50px">
        <div class="bigcart"></div>
        <h1>Your shopping cart</h1>
        <p>
             It looks nice on both desktop and mobile browsers. Try it by resizing your window (or opening it on your smartphone and pc).
        </p>
        <hr>
        <div class="col-md-10">
            <a href="{{ url('/home') }}" class="btn btn-block btn-lg btn-warning"><i class="fa fa-chevron-left fa-sm"></i>&nbsp;<b>BACK TO SHOP</b></a>
        </div>
    </div>
    
    <div class="col-md-7 col-sm-12 text-left">
        <ul>
            <li class="row list-inline columnCaptions">
                <span>QTY</span>
                <span>ITEM</span>
                <span>Price</span>
            </li>
            @foreach ($carts as $cart)
            <li class="row">
                <span class="quantity">
                    <font id="quantity-digit">
                        {{ $cart -> quantity }}
                    </font>
                    <input type="number" name="quantity" id="quantity-input" min="1" max="5" value="{{ $cart -> quantity }}"></span>
                <span class="itemName">{{ $cart -> product_name }}</span>
                <span class="popbtn"><a class="arrow"></a></span>
                <span class="price">$ {{ $cart -> product_price }}</span>
            </li>
            @endforeach
            <li class="row totals">
                <span class="itemName">Total:</span>
                <span class="price">$
                    <?php $total = 0; ?>
                    @foreach ($carts as $cart)
                    <?php
                        $price = $cart -> product_price;
                        $quantity = $cart -> quantity;

                        $subtotal = $price * $quantity;
                        $total += $subtotal;
                    ?>
                    @endforeach
                    {{ $total }}.00
                    </span>
                <span class="order"> <button class="text-center btn btn-danger btn-lg" style="">ORDER</button></span>
            </li>
        </ul>
    </div>
</div>

@foreach ($carts as $cart)
<!-- The popover content -->
<div id="popover" style="display: none">
    <button class="btn-link" href="#" onclick="document.getElementByID('quantity-digit').style.display='none'"><span class="fa fa-pencil fa-2x update"></span></button>
    <form action="/cart/delete" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="product_code" value="{{ $cart -> product_code }}">
        <button class="btn-link" href="#"><span class="fa fa-remove fa-2x delete"></span></button>
    </form>
</div>
@endforeach

<!-- JavaScript includes -->
<script src="{{ asset('js/jquery-1.11.min.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/customjs.js') }}"></script>

@endsection
