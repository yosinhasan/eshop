<?php

namespace App\Repositories\Impl;

use App\Repositories\BrandRepository;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

/**
 * Mysql brand repository implementation.
 * 
 * @author Yosin_Hasan
 */
class BrandRepositoryImpl implements BrandRepository {

    private static $SELECT_QUERY_READ_WITH_AMOUNT = "SELECT b.`id`, b.`name`, COUNT(p.`id`) as amount FROM brands b INNER JOIN products p ON b.id = p.brand_id GROUP BY b.id";

    public function create($data) {
        if ($data->validate()) {
            $item = new Category();
            $item->name = $data->get('name');
            return $item->save();
        }
    }

    public function read($id) {
        $id = (int) $id;
        if ($id < 0) {
            return null;
        }
        return Brand::findOrFail($id);
    }

    public function update($data, $id) {
        if ($data->validate()) {
            $item = $this->read($id);
            $item->name = $data->get('name');
            return $item->save();
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
        return Brand::all();
    }

    public function readWithAmount() {
        return DB::select(self::$SELECT_QUERY_READ_WITH_AMOUNT);
    }

}
