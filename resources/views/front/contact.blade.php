@extends('layouts.app')
@section('title')
{{ trans('title.contact')}}
@stop
@section('content')
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">    		
            <div class="col-sm-12">    			   			
                <h2 class="title text-center">{{ trans('front/products.Contact Us') }}</h2>    			    				    				
                <!--                <div id="gmap" class="contact-map">
                                </div>-->
            </div>			 		
        </div>    	
        <div class="row">  	
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">{{ trans('front/products.Get In Touch') }}</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="{{ trans('auth/auth.name')}}">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" placeholder="{{ trans('auth/auth.email_address')}}">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" required="required" placeholder="{{ trans('auth/auth.Subject')}}">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="{{ trans('auth/auth.Your Message Here')}}"></textarea>
                        </div>                        
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="{{ trans('front/products.submit') }}">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">{{ trans('front/products.Contact Info') }}</h2>
                    <address>
                        <p>{{ trans('front/products.Company') }}</p>
                        <p>{{ trans('front/products.Address') }}</p>
                        <p>{{ trans('front/products.Location') }}</p>
                        <p>{{ trans('front/products.Mobile') }}: +2346 17 38 93</p>
                        <p>{{ trans('front/products.Fax') }}: 1-714-252-0026</p>
                        <p>{{ trans('front/products.Email') }}: info@e-shopper.com</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">{{ trans('front/products.Social Networking') }}</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    			
        </div>  
    </div>	
</div><!--/#contact-page-->

@stop