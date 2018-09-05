@extends('layouts.main.frame')

@section('content')
    <style>
        .products.wrapper {
            padding: 2em 3em;
        }
    </style>

    <div class="products wrapper">
        <h2 class="title">PRODUCTS</h2>
        @foreach($products as $key=>$product)
            {{--@if($key%3 == 0)--}}
            {{--<div class=" top-products">--}}
            {{--@endif--}}
            <div class="col-md-3 md-col" style="padding: 1em;">
                <div class="col-md">
                    <a href="single.html" class="compare-in"><img  src="{{ $product->image }}" alt="" />
                        <div class="compare">
                            <span>Add to Compare</span>
                            <span>Add to Wishlist</span>
                        </div>
                    </a>
                    <div class="top-content">
                        <h5><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h5>
                        <div class="white">
                            <a href="single.html" class="hvr-shutter-in-vertical hvr-shutter-in-vertical2">ADD TO CART</a>
                            <p class="dollar"><span class="in-dollar">¥</span>
                                @php
                                $price = ceil($product->minPrice());
                                for($i=0; $i<strlen($price); $i++)
                                {
                                    echo '<span>' . ((string)$price)[$i] . '</span>';
                                }
                                @endphp
                                {{--<span>2</span><span>0</span>--}}
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            {{--@if($key%4 == 4)--}}
            {{--</div>--}}
            {{--@endif--}}
        @endforeach
    </div>

@stop