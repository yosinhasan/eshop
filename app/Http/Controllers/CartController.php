<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CartFormRequest;
use App\Factory\Impl\ShopFactory;

class CartController extends Controller {

    private $cart;
    private $product;
    private $order;

    public function __construct(ShopFactory $factory) {
        $this->cart = $factory->cart();
        $this->product = $factory->product();
        $this->order = $factory->order();
    }

    public function add(Request $request) {
        $amount = ($request->amount <= 0) ? 1 : $request->amount;
        if (isset($request->id)) {
            if ($request->id < 0) {
                $id = abs($request->id);
                $this->cart->sub($id, $amount);
            } else {
                $this->cart->add($request->id, $amount);
            }
        }
        return redirect()->back();
    }

    public function delete(Request $request) {
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
        $all = $this->cart->readAll();
        $ids = array_keys($all);
        if (count($all) <= 0) {
            return redirect()->action("HomeController@products");
        }
        $products = $this->product->readByParams(['ids' => $ids]);
        return view('front.cart', compact('all', 'products'));
    }

    public function checkout() {
        $all = $this->cart->readAll();
        $ids = array_keys($all);
        if (count($all) <= 0) {
            return redirect()->action("HomeController@products");
        }
        $products = $this->product->readByParams(['ids' => $ids]);
        return view('front.checkout', compact('all', 'products'));
    }

    public function complete(Request $request) {
        if ($request->isMethod('post')) {
            $all = $this->cart->readAll();
            $ids = array_keys($all);
            $data = [];
            $products = $this->product->readByParams(['ids' => $ids]);
            $status = 500;
            foreach ($products as $product) {
                $data[$product->id]['price'] = $product->price;
                $data[$product->id]['amount'] = $all[$product->id];
            }
            if ($this->order->saveOrder($data, auth()->user()->id)) {
                $this->cart->flush();
                $status = 200;
            }
            return redirect()->action("CartController@complete", ['orderStatus' => $status]);
        }
        $status = $request->orderStatus;
        return view('front.complete', compact('status'));
    }

}
