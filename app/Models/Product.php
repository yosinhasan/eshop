<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    public function brand() {
        return $this->belongsTo("App\Models\Brand");
    }

    public function photos() {
        return $this->hasMany("App\Models\Photo");
    }

    public function condition() {
        return $this->belongsTo("App\Models\Condition");
    }

    public function available() {
        return $this->belongsTo("App\Models\Available");
    }

}
