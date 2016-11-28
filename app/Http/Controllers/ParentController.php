<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParentController extends Controller
{

  function feed () {
      return view ('private.feed.parent');
  }

  /*

  function editChildren () {
    if (Auth::user()->hasChildren){ // definir
      return view ('private.profile.edit.children');
    }
  }

  */

}
