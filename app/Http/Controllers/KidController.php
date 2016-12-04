<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KidController extends Controller
{
  function profile(){
      return view ('private.profile.kid');
  }
}
