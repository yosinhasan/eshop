<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{ url('/') }}"><img src="{{ asset('images/home/logo.png')  }}" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                {{ trans('app.'.App::getLocale()) }}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                @if(App::getLocale() == "en") 
                                <li><a href="{{ url('locale/ru') }}">{{ trans('app.ru') }}</a></li>
                                <li><a href="{{ url('locale/de') }}">{{ trans('app.de') }}</a></li>
                                @elseif(App::getLocale() == 'ru')
                                <li><a href="{{ url('locale/en') }}">{{ trans('app.en') }}</a></li>
                                <li><a href="{{ url('locale/de') }}">{{ trans('app.de') }}</a></li>
                                @elseif(App::getLocale() == 'de')
                                <li><a href="{{ url('locale/en') }}">{{ trans('app.en') }}</a></li>
                                <li><a href="{{ url('locale/ru') }}">{{ trans('app.ru') }}</a></li>
                                @endif
                            </ul>
                        </div>

                        <!--                                <div class="btn-group">
                                                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                                                DOLLAR
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="#">Canadian Dollar</a></li>
                                                                <li><a href="#">Pound</a></li>
                                                            </ul>
                                                        </div>-->
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">

                            <li><a href="#"><i class="fa fa-star"></i> {{ trans('app.Wishlist') }}</a></li>
                            <li><a href="{{ url('/checkout')}}"><i class="fa fa-crosshairs"></i> {{ trans('app.Checkout') }}</a></li>
                            <li><a href="{{  url('/cart') }}"><i class="fa fa-shopping-cart"></i> {{ trans('app.Cart') }}</a></li>
                            @if (Auth::check())
                            @if(Auth::user()->hasRole('manager'))
                            <li><a href="{!! url('/admin') !!}"><i class="fa fa-user"></i>{{ Auth::user()->name }} </a></li>
                            @else 
                            <li><a href="#"><i class="fa fa-user"></i>{{ trans('app.Account') }} </a></li>
                            @endif
                            <li><a href="{{ url('/auth/logout')}}"><i class="fa fa-lock"></i> {{ trans('app.Logout') }}</a></li>
                            @else
                            <li><a href="{{ url('/auth/register')}}"><i class="fa fa-lock"></i> {{ trans('app.Signup') }}</a></li>
                            <li><a href="{{ url('/auth/login')}}"><i class="fa fa-lock"></i> {{ trans('app.Login') }}</a></li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">{{ trans('app.Toggle navigation') }}</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ url('/')}}" class="active">{{ trans('app.Home') }}</a></li>
                            <li class="dropdown"><a href="#">{{ trans('app.Shop') }}<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{ url('/products')}}">{{ trans('app.Products') }}</a></li>
                                    <li><a href="{{ url('/checkout')}}">{{ trans('app.Checkout') }}</a></li> 
                                    <li><a href="{{ url('/cart')}}">{{ trans('app.Cart') }}</a></li> 
                                </ul>
                            </li> 
                            <li><a href="{{ url('/blog')}}">{{ trans('app.Blog') }}</a></li> 
                            <li><a href="{{ url('/about')}}">{{ trans('app.About') }}</a></li> 
                            <li><a href="{{ url('/contact')}}">{{ trans('app.Contact') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->