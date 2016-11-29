<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{

  static function feed () {

    $kids = Auth::user()->kids();

    dd('HACER');

      return view ('private.feed.parent', ['posts' => 'hola']);
  }

  /*

  function editChildren () {
    if (Auth::user()->hasChildren){ // definir
      return view ('private.profile.edit.children');
    }
  }

  */

}
