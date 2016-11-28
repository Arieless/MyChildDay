<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['contentText'];

    public function user() {
      return $this->belongsTo(Class::User, 'user_id');
    }

    public function school() {
      return $this->belongsTo(Class::School, 'school_id');
    }

    public function postType () {
      return $this->hasOne(Class::Posttype, 'posttype_id');
    }

    public function tagged () {
      return $this->belongsToMany(Class::Kid, 'post_kid', 'post_id', 'kid_id');
    }

    public function lastTen($query) {
      return $query->take(10)->orderBy('created_at', 'DESC');
    }
}
