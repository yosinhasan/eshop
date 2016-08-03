<?php

namespace App\Repositories;

/**
 * Review repository.
 * @author Yosin_Hasan
 */
interface ReviewRepository extends BaseRepository {

    /**
     * Gets all review for related product.
     *  
     * @param type $product_id product id
     */
    public function readByProductId($product_id);
}
