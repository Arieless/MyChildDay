<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{

  static function feed () {
      return view ('private.feed.teacher');
  }

  function post () {
      return view ('private.feed.teacher', [ 'displayPost' => 'true']);
  }

}
