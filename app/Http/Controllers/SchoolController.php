<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{

  function feed () {
      return view ('private.feed.school');
  }

  /*

  function editSchoolTemp () {

    return view('private.profile.edit.school');
  }

  function editSchool () {

      return view ('private.profile.edit.school');
  }

  */

}
