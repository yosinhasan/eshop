<?php

namespace App\Repositories\Impl;

use App\Repositories\OrderRepository;
use App\Models\Order;
use App\Models\Order_product;

/**
 * Session cart repository implementation.
 * 
 * @author Yosin_Hasan
 */
final class OrderRepositoryImpl implements OrderRepository {

    public function create($data) {
        $order = new Order();
        $order->user_id = $data->user_id;
        $order->total_price = $data->total_price;
        $order->total_amount = $data->total_amount;
        return $order->save();
    }

    public function delete($id) {
        return Order::destroy($id);
    }

    public function read($id) {
        return Order::findOrFail($id);
    }

    public function update($data, $id) {
        $order = $this->read($id);
        $order->user_id = $data->user_id;
        $order->total_price = $data->total_price;
        $order->total_amount = $data->total_amount;
        $order->save();
    }

    public function readAll($limit = null) {
        return Order::all();
    }

    public function saveOrder($data, $user_id) {
        $products = [];
        $totalAmount = 0;
        $totalPrice = 0;
        foreach ($data as $key => $value) {
            $products[$key]['product_id'] = $key;
            $products[$key]['amount'] = $value['amount'];
            $price = $value['price'] * $value['amount'];
            $products[$key]['price'] = $price;
            $totalAmount += $value['amount'];
            $totalPrice += $price;
        }
        $order = Order::create([
                    'user_id' => $user_id,
                    'total_amount' => $totalAmount,
                    'total_price' => $totalPrice
        ]);
        $id = $order->id;
        $products = collect($products)->map(function (array $data) use ($id) {
                    return array_merge([
                        'order_id' => $id,
                            ], $data);
                })->all();
        Order_product::insert($products);
        return true;
    }

}
