@extends('layouts.app')
@section('title')
{{ trans('title.products')}}
@stop
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('shared.sidebar')
                <br class="clear" /> 
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">{{ trans('front/products.Items') }}</h2>
                    @if(count($products) > 0)
                    @foreach($products as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('images/home/'.$product->avatar)}}" alt="" />
                                    <h2>${{$product->price}}</h2>
                                    <p>{{$product->name}}</p>
                                    <a href="{{ url('/addtocart?id='.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{ trans('front/products.Add to cart') }}</a>
                                    <a href="{{ url('/product/'.$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa fa-folder-open"></i>{{ trans('front/products.Detail') }}</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>${{$product->price}}</h2>
                                        <p>{{$product->name}}</p>
                                        <a href="{{ url('/addtocart?id='.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{ trans('front/products.Add to cart') }}</a>
                                        <a href="{{ url('/product/'.$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa fa-folder-open"></i>{{ trans('front/products.Detail') }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>{{ trans('front/products.Add to wishlist') }}</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>{{ trans('front/products.Add to compare') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else 
                    <h3>{{ trans('front/products.no_items')}}</h3>
                    @endif
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>


@stop