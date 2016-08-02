<?php

namespace App\Repositories;

/**
 * Brand repository.
 * @author Yosin_Hasan
 */
interface BrandRepository extends BaseRepository {

    /**
     * Gets all brands with their amount of products. 
     * 
     * @return Collection<Object>
     */
    public function readWithAmount();
}
