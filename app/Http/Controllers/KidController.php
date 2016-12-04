<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KidController extends Controller
{
  function profileKid(){
      return view ('private.profile.kid');
  }
}
