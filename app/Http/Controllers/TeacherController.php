<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Kid;
use App\User;
use App\School;
use App\Posttype;

class TeacherController extends Controller
{

  function profile($idTeacher, $teacherName){

    $teacher = User::where("id", $idTeacher);
    return view ('private.profile.teacher', ['teacher' => $teacher]);
  }

  function log (Request $request) {

    $request->session()->put('rol', 'teacher');
    return redirect()->action('ParentController@feed'); // Rol should be assigned in middleware this is for the moment
  }


  function feed () { // Request->user() vs Auth::user()

    $user = Auth::user();

    $posts = $user->postsWhereTeaches()->get()->unique(function ($item) {   // I dont really know what i have to filter it ...
                                return $item['kidId']."-".$item['postId'];
                            });


    $kids = $posts->unique('kidId');

    return view ('private.feed.teacher', ['posts' => $posts, 'kids' => $kids]);

  }

  function post () { // Request->user() vs Auth::user()

    $user = Auth::user();

    $posts = $user->postsWhereTeaches()->get()->unique(function ($item) {   // I dont really know what i have to filter it ...
                                return $item['kidId']."-".$item['postId'];
                            });

    $kids = $posts->unique('kidFirstName');


    $kidsToPost = $user->teacherInRooms()
                        ->select('rooms.id as roomId', 'rooms.profilePicture as roomProfilePicture', 'rooms.name as roomName')
                        ->join('kid_room', 'kid_room.room_id', '=', 'rooms.id')
                        ->join(Kid::getTableName(), 'kids.id', '=', 'kid_room.kid_id')
                        ->addSelect('kids.id as kidId', 'kids.firstName as kidFirstName', 'kids.LastName as kidLastName', 'kids.profilePicture as kidProfilePicture')
                        ->join(School::getTableName(), 'schools.id', '=', 'rooms.school_id')
                        ->addSelect('schools.id as schoolId', 'schools.name as schoolName')
                        ->get()
                        ->unique(function ($item) {
                            return $item['roomId']."-".$item['kidId'];
                        });

    $roomsToPost = $kidsToPost->unique('roomId'); // you can not make a post in an empty room¿?

    $postTypes = Posttype::all();

    return view ('private.feed.teacher', [
                                          'displayPost' => 'true',
                                          'kidsToPost' => $kidsToPost,
                                          'roomsToPost' => $roomsToPost,
                                          'posts' => $posts,
                                          'kids' => $kids,
                                          'formAction' => url('/home/teacher/post'),
                                          'postTypes' => $postTypes,
                                        ]);
  }
}
