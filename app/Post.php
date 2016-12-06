<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['contentText', 'user_id', 'school_id', 'postType_id', 'room_id'];

    public function user() {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function school() {
      return $this->belongsTo(School::class, 'school_id');
    }

    public function postType () {
      return $this->hasOne(Posttype::class, 'postType_id');
    }

    public function tagged () {
      return $this->belongsToMany(Kid::class, 'post_kid', 'post_id', 'kid_id');
    }

    public function lastTen($query) {
      return $query->take(10)->orderBy('created_at', 'DESC');
    }
}
