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

    $posts = DB::table('schools')->where('schools.user_id', '=', Auth::user()->id)
                                  ->select('schools.name as schoolName', 'schools.profilePicture as schoolProfilePicture')
                                  ->join('posts', 'posts.school_id', '=', 'schools.user_id')
                                  ->addSelect('posts.contentText as contentText', 'posts.created_at as date' )
                                  ->join('posttypes', 'posts.postType_id', '=', 'posttypes.id')
                                  ->addSelect('posttypes.type as typeName', 'posttypes.id as typeId', 'posttypes.icon as typeIcon')
                                  ->join('users', 'posts.user_id', "=", 'users.id')
                                  ->addSelect('users.firstName as teacherFirstName', 'users.lastName as teacherLastName', 'users.profilePicture as teacherProfilePicture')
                                  ->join('post_kid', 'post_kid.post_id', '=', 'posts.id')
                                  ->join('kids', 'post_kid.kid_id', "=", 'kids.id')
                                  ->addSelect('kids.firstName as kidFirstName', 'kids.lastName as kidLastName', 'kids.profilePicture as kidProfilePicture')
                                  ->orderBy('date')
                                  ->get();

    $kids = $posts->unique('kidFirstName'); // arreglar esto, capaz desde la vista.

    return view ('private.feed.school', ['posts' => $posts, 'kids' => $kids]);

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

  function profile(){
      return view ('private.profile.school');
  }

  function edit () {
      return view ('private.profile.edit.school');
  }

  function rooms() {
      $rooms = Auth::user()->school()->first()->rooms()->get();
      $teachersCollect = collect();
      foreach ($rooms as $room) {
        $teachersCollect->push($room->teachers()->get());
      }
      $teachersInRoom = [];
      foreach ($teachersCollect as $teacherTemp) {
        foreach ($teacherTemp as $teacher) {
          array_push($teachersInRoom, $teacher);
        }
      }
      //falta saber qe teacher corresponde a que room
      // dd($teachers[0]->firstName);
      return view ('private.lists.rooms',['rooms' => $rooms, 'teachersInRoom' => $teachersInRoom]);
  }

  function kids() {
      return view ('private.lists.kids');
  }

  function teachers() {
    //falta saber qe teacher corresponde a que room
    $rooms = $this->rooms()->rooms;
    $teacherInSchool = $this->rooms()->teachersInRoom;
      return view ('private.lists.teachers', ['teachersInSchool' => $teacherInSchool, 'rooms' => $rooms]);
  }

}
