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

  function log (Request $request) {

    $request->session()->put('rol', 'parent');

    return redirect()->action('ParentController@feed'); // Rol should be assigned in middleware this is for the moment
  }

  function feed (Request $request) {

    if ($request->has('activityOption') && $request->input('activityOption')){
      $postsQuery = Auth::user()->postsOfKidsHeHas()->where('posts.posttype_id', '=', $request->input('activityOption'));
      $posttypeSelected = $request->input('activityOption');
    }else{
      $postsQuery = Auth::user()->postsOfKidsHeHas();
      $posttypeSelected = $request->has('activityOption')? $request->input('activityOption') : 'default';
    }

    // add select kid id

    $posts = $postsQuery->get();

    $kids = $posts->unique('kidId');

    $posttypes = Posttype::all();;

    return view ('private.feed.parent', ['posts' => $posts, 'kids' => $kids ,'posttypes' => $posttypes, 'posttypeSelected' => $posttypeSelected]);

  }

}
