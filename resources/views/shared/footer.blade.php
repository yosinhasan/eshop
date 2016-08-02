<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>e</span>-shopper</h2>
                        <p>{{ trans('app.logoDescription') }}</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{ asset('images/home/iframe4.png')  }}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Actie play</p>
                            <h2>24 DEC 2016</h2>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{ asset('images/home/iframe4.png')  }}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Actie play</p>
                            <h2>24 DEC 2016</h2>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{ asset('images/home/iframe4.png')  }}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Actie play</p>
                            <h2>24 DEC 2016</h2>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{ asset('images/home/iframe4.png')  }}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Actie play</p>
                            <h2>24 DEC 2016</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="{!! asset('images/home/map.png')!!}" alt="" />
                        <p>{{ trans('app.shopAddress') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>{{ trans('app.Service') }}</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">{{ trans('app.Online Help') }}</a></li>
                            <li><a href="#">{{ trans('app.Contact Us') }}</a></li>
                            <li><a href="#">{{ trans('app.Order Status') }}</a></li>
                            <li><a href="#">{{ trans('app.Change Location') }}</a></li>
                            <li><a href="#">{{ trans('app.FAQ’s') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>{{ trans('app.Quock Shop') }}</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">{{ trans('app.T-Shirt') }}</a></li>
                            <li><a href="#">{{ trans('app.Mens') }}</a></li>
                            <li><a href="#">{{ trans('app.Womens') }}</a></li>
                            <li><a href="#">{{ trans('app.Gift Cards') }}</a></li>
                            <li><a href="#">{{ trans('app.Shoes') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>{{ trans('app.Policies') }}</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">{{ trans('app.Terms of Use') }}</a></li>
                            <li><a href="#">{{ trans('app.Privecy Policy') }}</a></li>
                            <li><a href="#">{{ trans('app.Refund Policy') }}</a></li>
                            <li><a href="#">{{ trans('app.Billing System') }}</a></li>
                            <li><a href="#">{{ trans('app.Ticket System') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>{{ trans('app.About') }}</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">{{ trans('app.Company Information') }}</a></li>
                            <li><a href="#">{{ trans('app.Careers') }}</a></li>
                            <li><a href="#">{{ trans('app.Store Location') }}</a></li>
                            <li><a href="#">{{ trans('app.Affillate Program') }}</a></li>
                            <li><a href="#">{{ trans('app.Copyright') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>{{ trans('app.About') }}</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">{{ trans('app.Copyright') }} © 2016 {{ trans('app.CompanyName') }} {{ trans('app.All rights reserved') }}.</p>
                <p class="pull-right">{{ trans('app.Designed by') }} <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->