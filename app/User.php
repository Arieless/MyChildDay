<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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

    public function school() {
      return $this->hasOne(School::class);
    }

    public function hasKids(){
      return $this->kids()->count() > 0? true : false;
    }

    public function kids() {
        return $this->belongsToMany(Kid::class, 'user_kid', 'user_id', 'kid_id');
    }

    public function postsWhereTeaches(){

      return $this->teacherInRooms()
                  ->join('posts', 'posts.room_id', '=', 'user_room.room_id')
                  ->select('posts.contentText as contentText', 'posts.created_at as date' )
                  ->join('posttypes', 'posts.posttype_id', '=', 'posttypes.id')
                  ->addSelect('posttypes.type as typeName', 'posttypes.id as typeId', 'posttypes.icon as typeIcon')
                  ->join('users', 'posts.user_id', "=", 'users.id')
                  ->addSelect('users.firstName as teacherFirstName', 'users.lastName as teacherLastName', 'users.profilePicture as teacherProfilePicture')
                  ->join('post_kid', 'post_kid.post_id', '=', 'posts.id')
                  ->join('kids', 'post_kid.kid_id', "=", 'kids.id')
                  ->addSelect('kids.firstName as kidFirstName', 'kids.lastName as kidLastName', 'kids.profilePicture as kidProfilePicture')
                  ->join('schools', 'posts.school_id', "=", 'schools.id')
                  ->addSelect('schools.name as schoolName', 'schools.profilePicture as schoolProfilePicture')
                  ->orderBy('date');
    }

    public function isTeacher() {
      return ($this->teacherRol > 0 && $this->teacherInRooms().count() > 0)? true : false;
    }

    public function teacherInRooms() {

        return $this->belongsToMany(Room::class, 'user_room', 'user_id', 'room_id');
    }

    public function hasRooms() {
      return ($this->isTeacher() && $this->teacherInRooms().count() > 0)? true : false;
    }


}
