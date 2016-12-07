<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KidController extends Controller
{
  function profile(){
      return view ('private.profile.kid');
  }
}


$parents= Kid::Where('kids.id', '=', $idKid)->select('kids.id as kidId', 'kids.firstName as kidFirstName', 'kids.lastName as kidLastName')
                                  ->join('user_kid', 'user_kid.kid_id', '=', 'kids.id')
                                  ->join('users', 'users.id', '=', 'user_kid.user_id', )
                                  ->addSelect('users.firstName as guardianFirstName', 'users.lastName as guardianLastName', 'users.id as guardiansId')
                                  ->get();
$kids = $parents->unique('kidId');
