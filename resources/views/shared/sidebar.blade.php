<div class="left-sidebar">
    <h2>{{ trans('front/products.Category') }}</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        <!--        <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                Sportswear
                            </a>
                        </h4>
                    </div>
                    <div id="sportswear" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                <li><a href="#">Nike </a></li>
                                <li><a href="#">Under Armour </a></li>
                                <li><a href="#">Adidas </a></li>
                                <li><a href="#">Puma</a></li>
                                <li><a href="#">ASICS </a></li>
                            </ul>
                        </div>
                    </div>
                </div>-->
        <?php $cat = request()->get("act") == "category"; ?>
        <div class="panel panel-<?= (!$cat && request()->get("id") == null) ? "warning" : "default"; ?>">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="{{ url('/products') }}">{{ trans('front/products.all') }}</a></h4>
            </div>
        </div>

        @foreach($categories as $category)
        <div class="panel panel-<?= ($cat && request()->get("id") == $category->id ) ? "warning" : "default"; ?>">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="{{ url('/products?act='.App\Config\Config::REQUEST_CATEGORY.'&id='.$category->id)}}">{{ $category->name }}</a></h4>
            </div>
        </div>
        @endforeach
    </div><!--/category-products-->

    <div class="brands_products"><!--brands_products-->
        <h2>{{ trans('front/products.Brands') }}</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                @foreach($brands as $brand)
                <li> <a href="{{ url('/products?act='.App\Config\Config::REQUEST_BRAND.'&id='.$brand->id)}}" <?= (!$cat && request()->get("id") == $brand->id) ? "class='bold'" : ""; ?><?= (!$cat && request()->get("id") == $brand->id) ? "class='active'" : ""; ?>> <span class="pull-right">({{$brand->amount}})</span>{{ $brand->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div><!--/brands_products-->

    <div class="price-range"><!--price-range-->
        <h2>{{ trans('front/products.Price_Range') }}</h2>
        <div class="well text-center">
            <form action="{{ url('/products') }}">
                <input name="price_range" type="text" class="span2" value="" data-slider-min="{{ $aggregate->min }}" data-slider-max="{{ $aggregate->max }}" data-slider-step="5" data-slider-value="[{{ $aggregate->min }},{{ $aggregate->max }}]" id="sl2" ><br />
                <input name="act" type="hidden" value="{{ Request::get('act')}}" />
                <input name="id" type="hidden" value="{{ Request::get('id')}}" />
                <b class="pull-left">$ {{ $aggregate->min }}</b> <b class="pull-right">$ {{ $aggregate->max }}</b>
                <button type="submit" class="btn btn-primary">{{ trans('front/products.submit')}}</button>
            </form>
        </div>
    </div><!--/price-range-->

    <div class="shipping text-center"><!--shipping-->
        <img src="{{ asset('images/home/shipping.jpg') }}" alt="" />
    </div><!--/shipping-->

</div>