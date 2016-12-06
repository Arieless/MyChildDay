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

  function log (Request $request) {

    $request->session()->put('rol', 'parent');

    return redirect()->action('ParentController@feed'); // Rol should be assigned in middleware this is for the moment
  }

  function feed () {

    $posts = Auth::user()->postsOfKidsHeHas()->get();

    $kids = $posts->unique('kidId');

    $postTypes = $posts->unique('typeId');

    return view ('private.feed.parent', ['posts' => $posts, 'kids' => $kids ,'postTypes' => $postTypes]);

  }

}
