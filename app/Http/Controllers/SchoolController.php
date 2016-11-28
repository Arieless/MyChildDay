<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{

  function feed () {
      return view ('private.feed.school');
  }

  function editSchool () {
      return view ('private.profile.edit.school');
  }


}
