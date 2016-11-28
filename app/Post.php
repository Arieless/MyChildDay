<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['contentText'];

    public function user() {
      return $this->belongsTo('App\User', 'user_id');
    }

    public function scopeTop($query) {
      return $query->take(10)->orderBy('created_at', 'DESC');
    }

}
