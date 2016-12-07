<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kid;
use Illuminate\Support\Facades\DB;

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

  function create (){
      return view ('private.create.kid');
  }

  function addParent (Request $request) {

    if ($request->has('parentEmail')){
      $parent = User::where('email', $request->input('parentEmail'))->get()->first();
    }

    // validaAddParent ()
    // Also check that is not already in the waiting list <-----------------------------------------------------------

    if (!$parent){

      $this->scheduleEntry([
                            'email' => $request->input('parentEmail'),
                            'kid_id' => $request->input('kid_id'),
                            'addedByUser_id' => $request->user()->id,
                            'school_id' => $request->user()->school()->first()->id,
                          ]);

      return redirect()->action('SchoolController@kids'); //->withErrors('some error' => 'that we should add');
    }

    $this->createRelation([
                            'user_id' => $parent->id,
                            'kid_id' => $request->input('kid_id')
                          ]);

      return redirect()->action('SchoolController@kids')->with('status', 'Guardian añadido!');;

  }


  private function validateAddParent (array $data){

    return Validator::make($data, [ // finish validations (validate that the user can make that connection)
        'parentEmail' => 'required',
        'email' => 'required',
    ]);
  }

  private function scheduleEntry (array $data){ // try catch redirect

    $data += [
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
              ];

    DB::table('schedule_user_kid')->insert($data);
  }

  private function createRelation (array $data){

    $data += [
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
              ];

    DB::table('user_kid')->insert($data);
  }

}
