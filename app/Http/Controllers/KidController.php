<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Kid;
use App\User;

class KidController extends Controller
{
  function profile($kidId){

    $kid = Kid::find($kidId);
    
    $parents= Kid::Where('kids.id', '=', $kidId)->select('kids.id as kidId', 'kids.firstName as kidFirstName', 'kids.lastName as kidLastName')
                                      ->join('user_kid', 'user_kid.kid_id', '=', 'kids.id')
                                      ->join('users', 'users.id', '=', 'user_kid.user_id')
                                      ->addSelect('users.id as guardianId', 'users.firstName as guardianFirstName', 'users.lastName as guardianLastName', 'users.profilePicture as guardianPicture')
                                      ->get();
    // $kids = $parents->unique('kidId');

    $kidInRoom = $kid->room;

    return view ('private.profile.kid', ['kid' => $kid, 'parents' => $parents, 'inRoom' => $kidInRoom]);
  }
}
