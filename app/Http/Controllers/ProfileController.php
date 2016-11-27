<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    function editUser () {
      
      return view('private.profile.edit.user');
    }

    function editSchoolTemp () {

      return view('private.profile.edit.school');
    }

    function editSchool () {

        return view ('private.profile.edit.school');
    }

    function editChildren () {
      if (Auth::user()->hasChildren){ // definir
        return view ('private.profile.edit.children');
      }
    }
}
