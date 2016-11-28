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
    return $this->belongsTo(Class::School, 'school_id');
  }

}
