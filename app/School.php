<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'address', 'telephone', 'email',
  ];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  public function owner() {

    return $this->belongsTo(User::class, 'user_id');
  }

  public function rooms () {
    return $this->hasMany(Room::class, 'school_id');  }

}
