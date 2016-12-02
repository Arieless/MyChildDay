<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Kid;

class TeacherController extends Controller
{

  static function feed () {
    // check if has rooms, if not, redirect to solicitate room or something like that.

      return view ('private.feed.teacher');
  }

  function post () {

      $rooms = Auth::user()->teacherInRooms;

      $kids = DB::table('kid_room')->whereIn('kid_id', $rooms->pluck('id'))
                                    ->join(Kid::getTableName(), 'kids.id', '=', 'kid_room.kid_id')
                                    ->orderBy('room_id')
                                    ->get();

      return view ('private.feed.teacher', [ 'displayPost' => 'true', 'kids' => $kids, 'rooms' => $rooms]);
  }



}
