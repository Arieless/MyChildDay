<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{

  static function feed () {
        // check if has schools, if not, redirect to add school or choose another rol.

      return view ('private.feed.school');
  }

  function editSchool () {
      return view ('private.profile.edit.school');
  }


}
