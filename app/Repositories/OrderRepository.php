<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

/**
 *
 * @author Yosin_Hasan
 */
interface OrderRepository extends BaseRepository {

    public function saveOrder($data, $user_id);
}
