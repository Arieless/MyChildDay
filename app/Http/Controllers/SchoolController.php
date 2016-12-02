<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Kid;
use App\Room;

class SchoolController extends Controller
{

  static function feed () {
        // check if has schools, if not, redirect to add school or choose another rol.

      return view ('private.feed.school');
  }

  function post () {

      $school = Auth::user()->school()->get();

      $kids = DB::table('rooms')->whereIn('rooms.id', $school->pluck('id'))
                                ->join('kid_room', 'rooms.id', "=", 'kid_room.room_id')
                                ->join(Kid::getTableName(), 'kids.id', '=', 'kid_room.kid_id')
                                ->orderBy('room_id')
                                ->get();

      $rooms = $kids->groupBy('room_id'); // terminar

      return view ('private.feed.school', [ 'displayPost' => 'true', 'kids' => $kids, 'rooms' => $rooms]);
  }

  function editSchool () {
      return view ('private.profile.edit.school');
  }


}
