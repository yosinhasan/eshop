<?php

namespace App\Config;

/**
 * Debugger.
 *
 * @author Yosin_Hasan
 */
final class Debugger {

    public final static function debug($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit();
    }

    public final static function show($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

}
