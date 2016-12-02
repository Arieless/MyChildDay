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

  static function feed () {
        // check if has kids, if not, redirect to add kids.

    $postTypes = Posttype::orderBy('type')->get()->all();
    $kids = Auth::user()->kids()->get();
    $posts = DB::table('post_kid')->whereIn('kid_id', $kids->pluck('id'))
                                  ->join(Post::getTableName(), 'posts.id', '=', 'post_kid.post_id')
                                  ->get();

    return view ('private.feed.parent', ['posts' => $posts, 'kids' => $kids ,'postTypes' => $postTypes]);
  }

}
