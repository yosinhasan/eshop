@extends('layouts.app')
@section('title')
{{ trans('title.product')}}
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
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{!! asset('images/home/'. $product->avatar) !!}" alt="" />
                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    @foreach($product->photos as $photo) 
                                    <a href=""><img src="{!! asset('images/product-details/'.$photo->photo) !!}" alt=""></a>
                                    @endforeach
                                </div>
                                <div class="item">
                                    <a href=""><img src="{!! asset("images/product-details/similar1.jpg") !!}" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img src="{!! asset("images/product-details/similar3.jpg") !!}" alt=""></a>
                                </div>

                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="{!! asset("images/product-details/new.jpg") !!}" class="newarrival" alt="" />
                                 <h2>{{ $product->name}}</h2>
                            <p>Web ID: {{ $product->id}}</p>
                            <div>  
                                @if ($rate != null) 
                                @for($i=0; $i < $rate->rate; $i++) 
                                <span class="glyphicon glyphicon-star"></span>
                                @endfor
                                @for($i=0; $i < 5-$rate->rate; $i++) 
                                <span class="glyphicon glyphicon-star-empty"></span>
                                @endfor
                                <span>({{$rate->votes}})</span>
                                @else
                                @for($i=0; $i < 5; $i++) 
                                <span class="glyphicon glyphicon-star-empty"></span>
                                @endfor
                                @endif
                            </div>
                            <span>
                                <span>US ${{ $product->price}}</span>
                                <label>Quantity:</label>
                                <form action="{{ url('/updatecart')}}" method="post" >
                                    {!! csrf_field() !!}
                                    <input name="id" type="hidden" min="1" value="{{ $product->id }}" />
                                    <input name="amount" type="number" min="1" value="{{ ($amount != null) ? $amount :1 }}" />
                                    <button type="submit" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </form>
                            </span>
                            <p><b>Availability:</b> {{ $product->available->name }}</p>
                            <p><b>Condition:</b> {{ $product->condition->name }}</p>
                            <p><b>Brand: </b>{{ strtoupper($product->brand->name) }}</p>
                            <a href=""><img src="{!! asset("images/product-details/share.png") !!}" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Details</a></li>
                            <li class="active"><a href="#reviews" data-toggle="tab">Reviews ({{ ($reviews != null) ? count($reviews) : 0}})</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details" >
                            <div class="col-sm-12">
                                {{ $product->details }}
                            </div>
                        </div>
                        <div class="tab-pane fade active in" id="reviews" >
                            <div class="col-sm-12">
                                @foreach($reviews as $review)
                                <div class="col-sm-12">
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i>{{ $review->name  }}</a></li>
                                        <li><a href=""><i class="fa fa-clock-o"></i>{{ date('g:i a', strtotime($review->created_at)) }}</a></li>
                                        <li><a href=""><i class="fa fa-calendar-o"></i>{{ date('d M Y', strtotime($review->created_at)) }}</a></li>
                                    </ul>
                                    <p>{{ $review->review }}</p>
                                </div>
                                @endforeach
                                @if (Auth::check())
                                <p><b>Write Your Review</b></p>
                                <form action="{{ url('/review')}}" method="post">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <textarea required="required" name="review"></textarea>
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><b>Rating: </b></td>
                                            <td> 
                                                <div class="rating-select">  
                                                    <div class="btn btn-default btn-sm" val="1">
                                                        <span class="glyphicon glyphicon-star-empty"></span>
                                                    </div>
                                                    <div class="btn btn-default btn-sm" val="2">
                                                        <span class="glyphicon glyphicon-star-empty"></span>
                                                    </div>
                                                    <div class="btn btn-default btn-sm" val="3">
                                                        <span class="glyphicon glyphicon-star-empty"></span>
                                                    </div>
                                                    <div class="btn btn-default btn-sm" val="4">
                                                        <span class="glyphicon glyphicon-star-empty"></span>
                                                    </div>
                                                    <div class="btn btn-default btn-sm" val="5">
                                                        <span class="glyphicon glyphicon-star-empty"></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="pull-right">
                                                <input class="rateProduct" type="hidden" name="rate" value="" />
                                                <button type="submit" class="btn btn-default pull-right">
                                                    {{ trans('front/products.submit') }}
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                @else
                                <p><b>Please log in in order to review the product</b></p>
                                @endif



                            </div>
                        </div>

                    </div>
                </div><!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">	
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{!! asset("images/home/recommend1.jpg") !!}" alt="" />
                                                     <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">	
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{!! asset("images/home/recommend1.jpg") !!}" alt="" />
                                                     <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>			
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>

@stop