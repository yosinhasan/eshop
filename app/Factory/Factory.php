<?php

namespace App\Factory;

/**
 * Factory.
 * 
 * @author Yosin_Hasan
 */
interface Factory {

    public function user();

    public function category();

    public function brand();

    public function product();

    public function cart($session_name = null);
}
