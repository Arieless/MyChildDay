<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    public function school() {
        return $this->belongsTo('App\School', 'school_id');
    }
}
