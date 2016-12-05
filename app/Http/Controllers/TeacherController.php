<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Kid;
use App\User;

class TeacherController extends Controller
{

  static function feed () {

    $posts = DB::table('user_room')->where('user_room.user_id', '=', Auth::user()->id)
                                  ->join('posts', 'posts.room_id', '=', 'user_room.room_id')
                                  ->select('posts.contentText as contentText', 'posts.created_at as date' )
                                  ->join('posttypes', 'posts.postType_id', '=', 'posttypes.id')
                                  ->addSelect('posttypes.type as typeName', 'posttypes.id as typeId', 'posttypes.icon as typeIcon')
                                  ->join('users', 'posts.user_id', "=", 'users.id')
                                  ->addSelect('users.firstName as teacherFirstName', 'users.lastName as teacherLastName', 'users.profilePicture as teacherProfilePicture')
                                  ->join('post_kid', 'post_kid.post_id', '=', 'posts.id')
                                  ->join('kids', 'post_kid.kid_id', "=", 'kids.id')
                                  ->addSelect('kids.firstName as kidFirstName', 'kids.lastName as kidLastName', 'kids.profilePicture as kidProfilePicture')
                                  ->join('schools', 'posts.school_id', "=", 'schools.id')
                                  ->addSelect('schools.name as schoolName', 'schools.profilePicture as schoolProfilePicture')
                                  ->orderBy('date')
                                  ->get();

    $kids = $posts->unique('kidFirstName');

    return view ('private.feed.teacher', ['posts' => $posts, 'kids' => $kids]);
  }

  function profile($idTeacher, $teacherName){

    $teacher = User::where("id", $idTeacher);
      return view ('private.profile.teacher', ['teacher' => $teacher]);
  }

  function post () {

    $rooms = Auth::user()->teacherInRooms;

    $kids = DB::table('kid_room')->whereIn('kid_id', $rooms->pluck('id'))
                                  ->join(Kid::getTableName(), 'kids.id', '=', 'kid_room.kid_id')
                                  ->orderBy('room_id')
                                  ->get();

    return view ('private.feed.teacher', [ 'displayPost' => 'true', 'kids' => $kids, 'rooms' => $rooms]);

  }

  function students () {

  }



}
