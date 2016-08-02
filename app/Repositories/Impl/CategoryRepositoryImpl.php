<?php

namespace App\Repositories\Impl;
use App\Repositories\CategoryRepository;
use App\Models\Category;

/**
 * Mysql user repository implementation.
 * 
 * @author Yosin_Hasan
 */
class CategoryRepositoryImpl implements CategoryRepository {

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
        return Category::findOrFail($id);
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
        return Category::destroy($id);
    }
    public function readAll($limit = null) {
        return Category::all();
    }

}
