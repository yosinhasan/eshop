<?php

namespace App\Repositories;

/**
 *
 * @author Yosin_Hasan
 */
interface CartRepository extends \App\Repositories\BaseRepository {

    /**
     * Add amount to respective product in storage.
     * 
     * @param type $id product id
     * @param type $amount product amount
     */
    public function add($id, $amount);

    /**
     * Clean storage. 
     */
    public function flush();
}
