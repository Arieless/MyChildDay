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
>>>>>>> new lists in profile

  function log (Request $request) {

    $request->session()->put('rol', 'parent');

    return redirect()->action('ParentController@feed'); // Rol should be assigned in middleware this is for the moment
  }

<<<<<<< c45659478581205e9bfe1ca13ca76e63eb1fc08b
  function feed () {

    $posts = Auth::user()->postsOfKidsHeHas()->get();

    $kids = $posts->unique('kidId');

    $posttypes = $posts->unique('typeId');

    return view ('private.feed.parent', ['posts' => $posts, 'kids' => $kids ,'posttypes' => $posttypes]);

  }

}
