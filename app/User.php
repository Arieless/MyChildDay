<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'address', 'phone', 'profilePicture', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function school () {
      return $this->hasOne(School::class);
    }

    public function hasKids(){
      return $this->kids()->count() > 0? true : false;
    }

    public function kids() {
        return $this->belongsToMany(Kid::class, 'user_kid', 'user_id', 'kid_id');
    }

    public function isTeacher () {
      return ($this->teacherRol > 0 && $this->teacherInRooms().count() > 0)? true : false;
    }

    public function teacherInRooms () {

        return $this->belongsToMany(Room::class, 'user_room', 'user_id', 'room_id');
    }

    public function hasRooms() {
      return ($this->isTeacher() && $this->teacherInRooms().count() > 0)? true : false;
    }


}
