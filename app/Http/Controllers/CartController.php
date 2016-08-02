<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CartFormRequest;
use App\Factory\Impl\ShopFactory;

class CartController extends Controller {

    private $cart;

    public function __construct(ShopFactory $factory) {
        $this->cart = $factory->cart();
    }

    public function add(Request $request) {
        $amount = ($request->amount <= 0) ? 1 : $request->amount;
        $this->cart->add($request->id, $amount);
        return redirect()->back();
    }

    public function remove(Request $request) {
        $this->cart->delete($request->id);
        return redirect()->back();
    }

    public function update(CartFormRequest $request) {
        if ($request->amount > 0) {
            $this->cart->update($request->amount, $request->id);
        }
        return redirect()->back();
    }

    public function clean() {
        $this->cart->flush();
        return redirect()->back();
    }

    public function index() {
        return view('front.cart');
    }

    public function checkout() {
        return view('front.checkout');
    }

}
