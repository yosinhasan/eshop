<?php

namespace App\Http\Requests;

/**
 * @author Yosin_Hasan 
 */
class CartFormRequest extends Request {

    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'id' => 'required|numeric',
            'amount' => 'required|numeric',
        ];
    }

}
