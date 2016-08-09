@extends('layouts.app')
@section('title')
{{ trans('title.checkout')}}
@stop
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="review-payment">
            <h2> {{ trans('front/products.Order status') }}: {{ $status }}</h2>
        </div>
        <div class="table-responsive cart_info">
            {{ trans('front/products.Order completed') }}.
        </div>
    </div>
</section> <!--/#cart_items-->
@stop