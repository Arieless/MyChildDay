<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'desactivated'
  ];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  public function school() {
    return $this->belongsTo(School::class, 'school_id');
  }

  public function teachers() {
    return $this->belongsToMany (User::class, 'user_room', 'room_id', 'user_id');
  }

  public function kids() {
    return $this->belongsToMany (Kid::class, 'kid_room', 'room_id', 'kid_id');
  }

}
