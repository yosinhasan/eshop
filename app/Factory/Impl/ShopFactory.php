<?php

namespace App\Factory\Impl;

use App\Factory\Factory;

class ShopFactory implements Factory {

    public function brand() {
        return new \App\Repositories\Impl\BrandRepositoryImpl;
    }

    public function category() {
        return new \App\Repositories\Impl\CategoryRepositoryImpl;
    }

    public function user() {
        return new \App\Repositories\Impl\UserRepositoryImpl;
    }

    public function product() {
        return new \App\Repositories\Impl\ProductRepositoryImpl;
    }

    public function cart($session_name = null) {
        return new \App\Repositories\Impl\CartRepositoryImpl($session_name);
    }

}
