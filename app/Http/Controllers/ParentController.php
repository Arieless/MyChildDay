<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Posttype;
use App\Post;
use Illuminate\Support\Facades\DB;

class ParentController extends Controller
{
  function profile(){

      return view ('private.profile.parent');
  }
  static function feed () {

    $posts = Auth::user()->kids()
                ->select('kids.firstName as kidFirstName', 'kids.lastName as kidLastName', 'kids.profilePicture as kidProfilePicture', 'kids.id as kidId')
                ->join('post_kid', 'post_kid.kid_id', '=', 'kids.id')
                ->join(Post::getTableName(), 'posts.id', '=', 'post_kid.post_id')
                ->addSelect('posts.contentText as contentText', 'posts.created_at as date', 'posts.id as postId' )
                ->join('posttypes', 'posts.postType_id', '=', 'posttypes.id')
                ->addSelect('posttypes.type as typeName', 'posttypes.id as typeId', 'postTypes.icon as typeIcon')
                ->join('users', 'posts.user_id', "=", 'users.id')
                ->addSelect('users.firstName as teacherFirstName', 'users.lastName as teacherLastName', 'users.profilePicture as teacherProfilePicture')
                ->join('schools', 'posts.school_id', "=", 'schools.id')
                ->addSelect('schools.name as schoolName', 'schools.profilePicture as schoolProfilePicture')
                ->orderBy('date', 'desc')
                ->get();


    $kids = $posts->unique('kidId');

    $postTypes = $posts->unique('typeId');

    return view ('private.feed.parent', ['posts' => $posts, 'kids' => $kids ,'postTypes' => $postTypes]);

  }

}
