<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;

class ProfileController extends Controller
{
    function editUser () {

      return view('private.profile.edit.user');
    }

    function updateUser (Request $request) {


      $validator = $this->validator($request->all());

      if ($validator->fails()){
        return redirect('/home/profile/edit/user')->withInput($request->all())->withErrors($validator);
      }else{
        redirect('/home');
      }
    }

    protected function validator(array $data)
    {
      // ACA HAY QUE RESOLVER LO DE LA IMAGEN
        return Validator::make($data, [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
    }

    protected function putUser ($data) {

      $user = Auth::user();

      $user->firstName = $data['firstName'];
      $user->lastName = $data['lastName'];
      $user->address = $data['address'];
      $user->phone = $data['phone'];
      $user->password = bcrypt($data['password']);
      $user->profilePicture = $data['profilePicture'];
      $user->save();

    }

}
