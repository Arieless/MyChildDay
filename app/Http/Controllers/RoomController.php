<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\User;

class RoomController extends Controller
{

  function profile($roomId, $roomName){

    $room = Room::find($roomId);

    $teachers = Room::Where('rooms.id', '=', $roomId)->select('rooms.id as roomId')
                                      ->join('user_room', 'user_room.room_id', '=', 'rooms.id')
                                      ->join('users', 'users.id', '=', 'user_room.user_id')
                                      ->addSelect('users.id as teacherId', 'users.firstName as teacherFirstName', 'users.lastName as teacherLastName')
                                      ->get();
    $kids = $room->kids;

    return view ('private.profile.room', ['room' => $room, 'teachers' => $teachers, 'kids' => $kids]);
  }

}
