<?php

namespace App\Repositories;

/**
 * Product repository.
 * 
 * @author Yosin_Hasan
 */
interface ProductRepository extends BaseRepository {

    public function readPopular($limit);

    public function readByCatId($id);

    public function readByBrandId($id);

    public function aggregateDetail($config = []);

    public function readByParams($params = []);
}
