@extends('layouts.app')
@section('title')
{{ trans('title.checkout')}}
@stop
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="review-payment">
            <h2>Order status: {{ $status }}</h2>
        </div>
        <div class="table-responsive cart_info">
            Order completed.
        </div>
    </div>
</section> <!--/#cart_items-->
@stop