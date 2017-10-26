@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{ asset('css/home-styles.css') }}">

@section('content')

<div class="container bootstrap snipets">
    <h1 class="text-center text-muted">Products</h1>
    <hr>
    @if(Session::has('message'))
        <div class="alert alert-success" style="text-align: center;">{!! Session::get('message') !!}</div>
    @endif
    <div class="row" style="text-align: center !important;">
        @foreach ($products as $product)
        <div class="col-xs-4 col-md-4">
            <div class="product tumbnail thumbnail-4">
                <a href="#">
                    <img src="{{ $product -> image }}" width="350px" height="300px" alt="">
                </a>
                <div class="caption">
                    <h4><a href="#">{{ $product -> product_name }}</a></h4>
                    <span class="price">
                        <del>$24.99</del>
                    </span>
                    <span class="price sale">${{ $product -> product_price }}.00</span>
                </div><br>
                <form action="/home/add" method="post" style="display: inline;">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_code" value="{{ $product -> product_code }}">
                    <input type="hidden" name="product_name" value="{{ $product -> product_name }}">
                    <input type="hidden" name="product_price" value="{{ $product -> product_price }}">
                    <input type="hidden" name="image" value="{{ $product -> image }}">
                    <input type="hidden" name="quantity" value="{{ $product -> quantity }}">

                    <button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i>&nbsp;Add to Cart </button>
                </form>
                <button class="btn btn-danger"><i class="fa fa-heart"></i>&nbsp;Add to Wishlist</button>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
