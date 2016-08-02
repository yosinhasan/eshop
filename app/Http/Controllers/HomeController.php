<?php

namespace App\Http\Controllers;

use App\Jobs\ChangeLocale;
use App\Factory\Impl\ShopFactory;
use Illuminate\Http\Request;

class HomeController extends Controller {

    private $category;
    private $brand;
    private $user;
    private $product;
    private $cart;

    function __construct(ShopFactory $factory) {
        $this->category = $factory->category();
        $this->brand = $factory->brand();
        $this->user = $factory->user();
        $this->product = $factory->product();
        $this->cart = $factory->cart();
    }

    /**
     * Display the home page.
     *
     * @return Response
     */
    public function index() {
        $categories = $this->category->readAll();
        $brands = $this->brand->readWithAmount();
        $products = $this->product->readPopular(config("product.limit_popular"));
        $aggregate = $this->product->aggregateDetail();
        return view('front.welcome', compact('categories', 'brands', 'products', 'aggregate'));
    }

    /**
     * Display the products page.
     *
     * @return Response
     */
    public function products(Request $request) {
        $categories = $this->category->readAll();
        $brands = $this->brand->readWithAmount();
        $products = $this->getProducts($request);
        $aggregate = $this->getAggregate($request);
        return view('front.products', compact('categories', 'brands', 'products', 'aggregate'));
    }

    /**
     * Display the product page.
     *
     * @return Response
     */
    public function product($id) {
        $amount = $this->cart->read($id);
        $categories = $this->category->readAll();
        $brands = $this->brand->readWithAmount();
        $aggregate = $this->product->aggregateDetail();
        $product = $this->product->read($id);
        return view('front.product', compact('categories', 'brands', 'product', 'aggregate', 'amount'));
    }

    /**
     * Display the contact page.
     *
     * @return Response
     */
    public function contact() {
        return view('front.contact');
    }

    /**
     * Display the about page.
     *
     * @return Response
     */
    public function about() {
        return view('front.about');
    }

    /**
     * Change language.
     *
     * @param  App\Jobs\ChangeLocaleCommand $changeLocale
     * @param  String $lang
     * @return Response
     */
    public function language($lang, ChangeLocale $changeLocale) {
        $lang = in_array($lang, config('app.languages')) ? $lang : config('app.fallback_locale');
        $changeLocale->lang = $lang;
        $this->dispatch($changeLocale);

        return redirect()->back();
    }

    private function getAggregate(Request $request) {
        $range = $this->getRange($request->get('price_range'));
        $params = [
            'start_price' => $range[0],
            'end_price' => $range[1],
            'action' => $request->get('act'),
            'id' => $request->get('id'),
        ];
        return $this->product->aggregateDetail($params);
    }

    private function getProducts(Request $request) {
        $range = $this->getRange($request->get('price_range'));
        $params = [
            'limit' => null,
            'offset' => null,
            'start_price' => $range[0],
            'end_price' => $range[1],
            'action' => $request->get('act'),
            'id' => $request->get('id'),
        ];
        return $this->product->readByParams($params);
    }

    private function getRange($price) {
        $range = explode(",", $price);
        if ((count($range) == 2) && ($range[1] >= $range[0])) {
            return $range;
        }
        return [-1, -1];
    }

}
