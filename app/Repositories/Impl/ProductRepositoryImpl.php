<?php

namespace App\Repositories\Impl;

use App\Repositories\ProductRepository;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Config\Config;

/**
 * Mysql product repository implementation.
 * 
 * @author Yosin_Hasan
 */
class ProductRepositoryImpl implements ProductRepository {

    public function create($data) {
        if ($data->validate()) {
            $item = new Product();
            $item->name = $data->get('name');
            $item->price = (double) $data->get('price');
            $item->avatar = (string) $data->get('avatar');
            $item->details = $data->get('details');
            $item->brand_id = (int) $data->get('brand_id');
            $item->available_id = (int) $data->get('available_id');
            $item->condition_id = (int) $data->get('condition_id');
            return $item->save();
        }
    }

    public function read($id) {
        $id = (int) $id;
        if ($id < 0) {
            return null;
        }
        return Product::with('photos', 'condition', 'available', 'brand')->findOrFail($id);
    }

    public function update($data, $id) {
        if ($data->validate()) {
            $item = $this->read($id);
            $item->name = $data->get('name');
            $item->price = (double) $data->get('price');
            $item->avatar = (string) $data->get('avatar');
            $item->details = $data->get('details');
            $item->brand_id = (int) $data->get('brand_id');
            $item->available_id = (int) $data->get('available_id');
            $item->condition_id = (int) $data->get('condition_id');
            return $user->save();
        }
    }

    public function delete($id) {
        $id = (int) $id;
        if ($id < 0) {
            return false;
        }
        return Brand::destroy($id);
    }

    public function readAll($limit = null) {
        if ($limit == null) {
            return Product::all();
        }
        return Product::take($limit)->get();
    }

    public function readPopular($limit) {
        return Product::take($limit)->get();
    }

    public function readByCatId($id) {
        return Product::join('category__product', 'products.id', '=', 'category__product.product_id')
                        ->select('products.*')
                        ->where('category__product.category_id', $id)
                        ->get();
    }

    public function readByBrandId($id) {
        return Product::where('brand_id', $id)
                        ->get();
    }

    public function readByParams($params = []) {
        $products = null;
        if (count($params) > 0) {
            $products = Product::query();
            if (isset($params['action']) && isset($params['id'])) {
                $id = abs((int) $params['id']);
                $act = $params['action'];
                switch ($act) {
                    case Config::REQUEST_CATEGORY:
                        $products->join('category__product', 'products.id', '=', 'category__product.product_id')
                                ->select('products.*')
                                ->where('category__product.category_id', $id);
                        break;
                    case Config::REQUEST_BRAND:
                        $products->where('products.brand_id', $id);
                        break;
                    default:
//to do
                        break;
                }
            }
            if ($params['start_price'] > 0 && $params['end_price'] > 0) {

                $products->where(function($query) use ($params) {
                    $query->where('price', '>=', $params['start_price'])
                            ->where('price', '<=', $params['end_price']);
                });
            }
            if (isset($params['limit'])) {
                $limit = abs((int) $params['limit']);
                $products->take($limit);
            }
            if (isset($params['offset'])) {
                $offset = abs((int) $params['offset']);
                $products->skip($offset);
            }
        }
        return $products->get();
    }

    public function aggregateDetail($params = []) {
        $select = "SELECT COUNT(p.id) as count, MAX(p.price) as max, MIN(p.price) as min FROM products p";
        $where = null;
        if (count($params) > 0) {
            if (isset($params['action']) && isset($params['id'])) {
                $id = abs((int) $params['id']);
                $act = $params['action'];
                switch ($act) {
                    case Config::REQUEST_CATEGORY:
                        $select .= " INNER JOIN category__product cp ON p.id = cp.product_id";
                        $where = " cp.category_id = " . $id;
                        break;
                    case Config::REQUEST_BRAND:
                        $where = " p.brand_id = " . $id;
                        break;
                    default:
//to do
                        break;
                }
            }
            if ($params['start_price'] > 0 && $params['end_price'] > 0) {
                if ($where != null) {
                    $where = " AND ";
                }
                $where = " p.price BETWEEN " . $params['start_price'] . " AND " . $params['end_price'];
            }
            if ($where != null) {
                $select .= " WHERE " . $where;
            }
        }
        return DB::select($select)[0];
    }

}
