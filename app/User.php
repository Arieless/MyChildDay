<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function hasKids(){
      return $this->kids()->count() > 0? true : false;
    }

    public function kids() {
        return $this->belongsToMany(Class::Kid, 'user_kid', 'user_id', 'kid_id');
    }

    public function isTeacher () {
      return ($this->teacherRol > 0 && $this->teacherInRooms().count() > 0) true : false;
    }

    public function teacherInRooms () {

        return $this->belongsToMany(Class::Room; 'user_room', 'user_id', 'room_id');
    }


}
