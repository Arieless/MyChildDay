<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'firstName', 'lastName', 'birthdate', 'description', 'profilePicture'
  ];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  public function school() {
    return $this->belongsTo(Class::School, 'school_id');
  }

  public function room() {
    return $this->belongsToMany(Class::Room, 'kid_room', 'kid_id', 'room_id');
  }

  public function guardians () {
    return $this->belongsToMany(Class::Users, 'user_kids', 'kid_id', 'user_id');
  }

  public function taggedIn() {
    return $this->belongsToMany(Class::Post, 'post_kid', 'kid_id', 'post_id')
  }

}
