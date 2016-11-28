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
    return $this->belongsTo(School::class, 'school_id');
  }

  public function room() {
    return $this->belongsToMany(Room::class, 'kid_room', 'kid_id', 'room_id');
  }

  public function guardians () {
    return $this->belongsToMany(Users::class, 'user_kids', 'kid_id', 'user_id');
  }

  public function taggedIn() {
    return $this->belongsToMany(Post::class, 'post_kid', 'kid_id', 'post_id')
  }

}
