@extends('layouts.app')
@section('title')
{{ trans('title.cart')}}
@stop
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">{{ trans('title.home')}}</a></li>
                <li class="active">{{ trans('title.cart')}}</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $amount = 0; ?>
                    @foreach($products as $product)
                    <tr>
                        <td class="cart_product">
                            <a href="{{ url('/product/'.$product->id)}}"><img src="{{asset('images/home/'.$product->avatar)}}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="{{ url('/product/'.$product->id)}}">{{ $product->name }}</a></h4>
                            <p>Web ID: {{ $product->id }}</p>
                        </td>
                        <td class="cart_price">
                            <p>$59</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="{{ url('/addtocart?id='.$product->id )}}"> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $all[$product->id]}}" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href="{{ url('/addtocart?id=-'.$product->id )}}"> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">$ <?php
                                $price = $all[$product->id] * $product->price;
                                $amount+=$price;
                                echo $price;
                                ?></p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{ url('deleteitem?id='.$product->id)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>${{ $amount }}</span></li>
                    </ul>
                    <a class="btn btn-default update" href="{{ url('/clearcart') }}">Clear cart</a>
                    <a class="btn btn-default check_out" href="{{ url('/checkout') }}">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

@stop