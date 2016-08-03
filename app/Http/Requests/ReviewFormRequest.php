<?php

namespace App\Http\Requests;

/**
 * @author Yosin_Hasan 
 */
class ReviewFormRequest extends Request {

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
            'product_id' => 'required|numeric',
            'review' => 'required',
            'user_id' => 'numeric',
            'rate' => 'numeric',
        ];
    }

}
