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
      if (Auth::user()->schoolRol){
        return view ('private.profile.edit.school');
      } else {
        return view('errors/403'); // forbidden
      }
    }

    function editChildren () {
      if (Auth::user()->hasChildren){ // definir
        return view ('private.profile.edit.children');
      }
    }
}
