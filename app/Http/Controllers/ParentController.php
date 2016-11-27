<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParentController extends Controller
{

  function feed () {
      return view ('private.feed.parent');
  }
  
}
