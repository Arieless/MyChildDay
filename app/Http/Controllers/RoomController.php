<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{

  function profile($idRoom, $roomName){

    $room = Room::where("id", $idRoom);
      return view ('private.profile.room', ['room' => $room]);
  }

}
