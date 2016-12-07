<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Posttype;
use App\Post;
use App\User;
use Illuminate\Support\Facades\DB;

class ParentController extends Controller
{
  function userProfile() {

      return view ('private.profile.user');
  }

  function parentProfile($guardianId) {
    $parent = User::find($guardianId);
      return view ('private.profile.parent', ['parent' => $parent]);
  }

  static function feed () {

    $kids = Auth::user()->kids()->get(); // Join the query

    $posts = DB::table('post_kid')->whereIn('kid_id', $kids->pluck('id'))
                                  ->join(Post::getTableName(), 'posts.id', '=', 'post_kid.post_id')
                                  ->select('posts.contentText as contentText', 'posts.created_at as date' )
                                  ->join('posttypes', 'posts.posttype_id', '=', 'posttypes.id')
                                  ->addSelect('posttypes.type as typeName', 'posttypes.id as typeId', 'posttypes.icon as typeIcon')
                                  ->join('users', 'posts.user_id', "=", 'users.id')
                                  ->addSelect('users.firstName as teacherFirstName', 'users.lastName as teacherLastName', 'users.profilePicture as teacherProfilePicture')
                                  ->join('kids', 'post_kid.kid_id', "=", 'kids.id')
                                  ->addSelect('kids.firstName as kidFirstName', 'kids.lastName as kidLastName', 'kids.profilePicture as kidProfilePicture')
                                  ->join('schools', 'posts.school_id', "=", 'schools.id')
                                  ->addSelect('schools.name as schoolName', 'schools.profilePicture as schoolProfilePicture')
                                  ->orderBy('date')
                                  ->get();


    $posttypes = $posts->pluck('typeName', 'typeId');


    return view ('private.feed.parent', ['posts' => $posts, 'kids' => $kids ,'posttypes' => $posttypes]);

  }

}
