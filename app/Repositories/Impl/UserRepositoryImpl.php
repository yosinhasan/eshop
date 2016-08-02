<?php

namespace App\Repositories\Impl;

use App\Repositories\UserRepository;
use App\Models\User;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserEditFormRequest;

/**
 * Mysql user repository implementation.
 * 
 * @author Yosin_Hasan
 */
class UserRepositoryImpl implements UserRepository {

    public function create($data) {
        if ($data->validate()) {
            $user = new User();
            $user->name = $data->get('name');
            $user->email = $data->get('email');
            $user->password = bcrypt($data->get('password'));
            return $user->save();
        }
    }

    public function read($id) {
        $id = (int) $id;
        if ($id < 0) {
            return null;
        }
        return User::findOrFail($id);
    }

    public function update($data, $id) {
        if ($data->validate()) {
            $user = $this->read($id);
            $user->name = $data->get('name');
            $user->email = $data->get('email');
            return $user->save();
        }
    }

    public function delete($id) {
        $id = (int) $id;
        if ($id < 0) {
            return false;
        }
        return User::destroy($id);
    }

    public function readAll($limit = null) {
        return User::all();
    }

}
