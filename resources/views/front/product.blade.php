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
                            <img src="{!! asset("images/product-details/rating.png") !!}" alt="" />
                                 <span>
                                <span>US ${{ $product->price}}</span>
                                <label>Quantity:</label>
                                <form action="{{ url('/updatecart')}}" method="post" >
                                    {!! csrf_field() !!}
                                    <input name="id" type="hidden" min="1" value="{{ $product->id }}" />
                                    <input name="amount" type="number" min="1" value="1" />
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
                            <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
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
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <p><b>Write Your Review</b></p>
                                <form action="#">
                                    <span>
                                        <input type="text" placeholder="Your Name"/>
                                        <input type="email" placeholder="Email Address"/>
                                    </span>
                                    <textarea name="" ></textarea>
                                    <b>Rating: </b> <img src="{!! asset("images/product-details/rating.png") !!}" alt="" />
                                                         <button type="button" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
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