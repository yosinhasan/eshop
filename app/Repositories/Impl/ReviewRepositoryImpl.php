<?php

namespace App\Repositories\Impl;

use App\Repositories\ReviewRepository;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

/**
 * Mysql review repository implementation.
 * 
 * @author Yosin_Hasan
 */
class ReviewRepositoryImpl implements ReviewRepository {

    private static $SELECT_QUERY_READ_WITH_AMOUNT = "SELECT b.`id`, b.`name`, COUNT(p.`id`) as amount FROM brands b INNER JOIN products p ON b.id = p.brand_id GROUP BY b.id";

    public function create($data) {
        $item = new Review();
        $item->product_id = $data->product_id;
        $item->user_id = $data->user_id;
        $item->review = $data->review;
        return $item->save();
    }

    public function read($id) {
        $id = (int) $id;
        if ($id < 0) {
            return null;
        }
        return Review::findOrFail($id);
    }

    public function update($data, $id) {
        if ($data->validate()) {
            $item = $this->read($id);
            $item->product_id = $data->product_id;
            $item->user_id = $data->user_id;
            $item->review = $data->review;
            return $item->save();
        }
    }

    public function delete($id) {
        $id = (int) $id;
        if ($id < 0) {
            return false;
        }
        return Review::destroy($id);
    }

    public function readAll($limit = null) {
        return Review::all();
    }

    public function readByProductId($product_id) {
        return Review::select(['reviews.*', 'users.name'])->where('reviews.product_id', '=', $product_id)->join('users', 'reviews.user_id', '=', 'users.id')->get();
    }

}
