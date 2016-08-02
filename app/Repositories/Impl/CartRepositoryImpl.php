<?php

namespace App\Repositories\Impl;

use App\Repositories\CartRepository;
use App\Config\Config;

/**
 * Session cart repository implementation.
 * 
 * @author Yosin_Hasan
 */
final class CartRepositoryImpl implements CartRepository {

    private $session_name;

    public function __construct($session_name = null) {
        $this->session_name = Config::CART_SESSION_NAME;
        if ($session_name != null) {
            $this->session_name = $session_name;
        }
    }

    public function create($data) {
        $this->$data['id'] = $data['amount'];
    }

    public function read($id) {
        return $this->$id;
    }

    public function update($data, $id) {
        $this->$id = $data;
    }

    public function delete($id) {
        unset($this->$id);
        return true;
    }

    public function readAll($limit = null) {
        return session()->get($this->session_name, []);
    }

    public function __get($name) {
        if (session()->has($this->session_name . "." . $name)) {
            return session()->get($this->session_name . "." . $name);
        }
        return null;
    }

    public function __set($name, $value) {
        $value = abs((int) $value);
        session()->put($this->session_name . "." . $name, $value);
    }

    public function __unset($name) {
        if (session()->has($this->session_name . "." . $name)) {
            session()->forget($this->session_name . "." . $name);
        }
    }

    public function __isset($name) {
        return session()->has($this->session_name . "." . $name);
    }

    public function add($id, $amount) {
        $amount = abs((int) $amount);
        if (isset($this->$id)) {
            $amount += $this->$id;
        }
        $this->$id = $amount;
    }

    public function sub($id, $amount) {
        $amount = abs((int) $amount);
        if (isset($this->$id)) {
            $amount = $this->$id - $amount;
            if ($amount <= 0) {
                return $this->delete($id);
            }
            $this->$id = $amount;
        }
    }

    public function flush() {
        session()->forget($this->session_name);
    }

}
