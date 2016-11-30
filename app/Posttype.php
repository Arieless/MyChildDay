<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posttype extends Model
{

  protected $fillable = [
      'type'
  ];

  public function post() {
    return $this->belongsTo(Post::class);
  }
}
