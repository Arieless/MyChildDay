<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;

class PostController extends Controller
{
    function uploadPost (Request $request) {



      if (Auth::user()->teacherInRooms()->where('id', $request->input('room_id'))->get())
      {
        $validator = $this->validate($request->all())

        if ($validator->fails()){
          //do something
        }

        no fails.
      }

      return redirect('home')->withErrors

    }


    private function validate ($data) {

      return Validator::make($data, [
          'postText' => 'required|max:255',
          'room_id' => 'required|max:255',
          'tag' => 'required',
      ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'postText' => $data['postText'],
            'room_id' => $data['room_id'],
            'tag' => $data['tag'],
            'school_id' => Room::find($data['room_id']),
            'user_id' => Auth::user()->id,
        ]);
    }
}
