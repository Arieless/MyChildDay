<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Kid;
use App\User;
use App\School;

class TeacherController extends Controller
{

  function profile($idTeacher, $teacherName){

    $teacher = User::where("id", $idTeacher);
    return view ('private.profile.teacher', ['teacher' => $teacher]);
  }

  static function feed (Request $request) { // Request->user() vs Auth::user()

    $posts = $request->user()->postsWhereTeaches()->get(); // funciona mal ¿?  VERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR


    // Forma alternativa incorrecta? ---------------------------
    $roomsID = $request->user()->teacherInRooms()->select('rooms.id as roomId')->get();
    $posts = DB::table('user_room')->where('user_room.room_id', '=', $roomsID->pluck('roomId')) // fix
                                  ->join('posts', 'posts.room_id', '=', 'user_room.room_id')
                                  ->select('posts.contentText as contentText', 'posts.created_at as date' )
                                  ->join('posttypes', 'posts.postType_id', '=', 'posttypes.id')
                                  ->addSelect('posttypes.type as typeName', 'posttypes.id as typeId', 'postTypes.icon as typeIcon')
                                  ->join('users', 'posts.user_id', "=", 'users.id')
                                  ->addSelect('users.firstName as teacherFirstName', 'users.lastName as teacherLastName', 'users.profilePicture as teacherProfilePicture')
                                  ->join('post_kid', 'post_kid.post_id', '=', 'posts.id')
                                  ->join('kids', 'post_kid.kid_id', "=", 'kids.id')
                                  ->addSelect('kids.firstName as kidFirstName', 'kids.lastName as kidLastName', 'kids.profilePicture as kidProfilePicture', 'kids.id as kidId')
                                  ->join('schools', 'posts.school_id', "=", 'schools.id')
                                  ->addSelect('schools.name as schoolName', 'schools.profilePicture as schoolProfilePicture')
                                  ->orderBy('date')
                                  ->get();
    // ----------------------------------------------------------


    $kids = $posts->unique('kidId');

    return view ('private.feed.teacher', ['posts' => $posts, 'kids' => $kids]);
  }

  function post (Request $request) { // Request->user() vs Auth::user()

    $posts = $request->user()->postsWhereTeaches()->get(); // funciona mal ¿? VERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
    $kids = $posts->unique('kidFirstName');

    $kidsToPost = $request->user()->teacherInRooms()
                        ->select('rooms.id as roomId', 'rooms.profilePicture as roomProfilePicture', 'rooms.name as roomName')
                        ->join('kid_room', 'kid_room.kid_id', '=', 'rooms.id')
                        ->join(Kid::getTableName(), 'kids.id', '=', 'kid_room.kid_id')
                        ->addSelect('kids.id as kidId', 'kids.firstName as kidFirstName', 'kids.LastName as kidLastName', 'kids.profilePicture as kidProfilePicture')
                        ->join(School::getTableName(), 'schools.id', '=', 'rooms.school_id')
                        ->addSelect('schools.id as schoolId', 'schools.name as schoolName')
                        ->orderBy('kids.firstName')
                        ->get()
                        ->unique('kidId'); // JUST BECAUSE THE SEEDERS ARE WRONG <----------------- WARNINGGGGGGGGGGGGGGGGGGGGGG

    $roomsToPost = $kidsToPost->unique('roomId'); // you can not make a post in an empty room¿?

    return view ('private.feed.teacher', ['displayPost' => 'true', 'kidsToPost' => $kidsToPost, 'roomsToPost' => $roomsToPost, 'posts' => $posts, 'kids' => $kids]);
  }
}
