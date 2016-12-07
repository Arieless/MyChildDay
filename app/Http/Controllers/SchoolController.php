<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Kid;
use App\Room;
use App\School;

class SchoolController extends Controller
{

  function profile(){
      return view ('private.profile.school');
  }

  function log (Request $request) {

    $request->session()->put('rol', 'school');
    return redirect()->action('SchoolController@feed'); // Rol should be assigned in middleware this is for the moment
  }

  function feed () {

    $posts = Auth::user()->school()
                        ->select('schools.name as schoolName', 'schools.profilePicture as schoolProfilePicture')
                        ->join('posts', 'posts.school_id', '=', 'schools.id')
                        ->addSelect('posts.contentText as contentText', 'posts.created_at as date')
                        ->join('posttypes', 'posts.postType_id', '=', 'posttypes.id')
                        ->addSelect('posttypes.type as typeName', 'posttypes.id as typeId', 'postTypes.icon as typeIcon')
                        ->join('users', 'posts.user_id', "=", 'users.id')
                        ->addSelect('users.firstName as teacherFirstName', 'users.lastName as teacherLastName', 'users.profilePicture as teacherProfilePicture')
                        ->join('post_kid', 'post_kid.post_id', '=', 'posts.id')
                        ->join('kids', 'post_kid.kid_id', "=", 'kids.id')
                        ->addSelect('kids.firstName as kidFirstName', 'kids.lastName as kidLastName', 'kids.profilePicture as kidProfilePicture', 'kids.id as kidId')
                        ->orderBy('date')
                        ->get();

    $kids = $posts->unique('kidId');

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

  function edit () {
      return view ('private.profile.edit.school');
  }

  function rooms() {
    $teachers = Auth::user()->school()
                            ->select('schools.id as schoolId', 'schools.name as schoolName')
                            ->join('rooms', 'rooms.school_id', '=', 'schools.id')
                            ->addSelect('rooms.id as roomId', 'rooms.name as roomName', 'rooms.profilePicture as roomProfilePicture' )
                            ->join('user_room', 'user_room.room_id', '=', 'rooms.id')
                            ->join('users', 'users.id', '=', 'user_room.user_id')
                            ->addSelect('users.id as teacherId', 'users.firstName as teacherFirstName', 'users.lastName as teacherLastName', 'users.profilePicture as teacherProfilePicture')
                            ->orderBy('users.firstName')
                            ->get();

    $rooms = $teachers->unique('roomId');

    return view ('private.lists.rooms',['rooms' => $rooms]);
  }

  function kids() {
    $kids = Auth::user()->school()
    						->join('rooms', 'rooms.school_id', '=', 'schools.id')
    						->select('rooms.id as roomId', 'rooms.name as roomName', 'rooms.profilePicture as roomProfilePicture' )
    						->join('kid_room', 'kid_room.room_id', '=', 'kid_room.kid_id')
    						->join('kids', 'kids.id', '=', 'kid_room.kid_id')
    						->addSelect('kids.id as kidId', 'kids.firstName as kidFirstName','kids.lastName as kidLastName' , 'kids.profilePicture as kidProfilePicture')
    						->orderBy('kidFirstName')
    						->get()
                ->unique(function ($item) {
                      return $item['kidId']."-".$item['roomId'];
                  });

    return view ('private.lists.kids',['kids' => $kids]);
  }

  function teachers() {
    $teachersInSchool = $this->rooms()->rooms;
    return view ('private.lists.teachers', ['teachersInSchool' => $teachersInSchool]);
  }

}
