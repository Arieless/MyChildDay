<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\Hash;
use Storage;

class ProfileController extends Controller
{

    function edit () {

      return view('private.profile.edit.user');
    }

    function update (Request $request) {


      if(Hash::check($request->input('password'), Auth::user()->password)){

        $validateData = $this->validatorData($request->except(['new-password','new-password_confirmation', 'change-password']));

        if ($request->input('change-password')){
          $validateNewPassword = $this->validatorNewPassword($request->only(['new-password','new-password_confirmation']));
        }

        if (isset($validateNewPassword) && $validateNewPassword->fails()){
          return redirect('/home/profile/edit/user')->withInput($request->except('change-password'))->withErrors($validateNewPassword);
        }

        if ($validateData->fails()){ // Have to fix so it shows the last data
          return redirect('/home/profile/edit/user')->withInput($request->except('change-password'))->withErrors($validateData);
        }

          $this->changeData($request->except(['new-password','new-password_confirmation', 'change-password']));

          if(isset($validateNewPassword)) $this->changePassword($request->only(['new-password','new-password_confirmation']));

          return redirect('/home');
      }

      return redirect(url('/home/profile/edit/user'))
          ->withInput($request->except('change-password'))
          ->withErrors(['password' => 'Contraseña incorrecta', // FIX THIS!!!!!!!!!! the error message should come from... ¿Some other place?
          ]);
    }


    private function validatorData(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'password' => 'required|min:6|',
            'profilePicture' => '' // here should validate the format. ¿?
        ]);
    }

    private function validatorNewPassword (array $data){
      return Validator::make($data, [
          'new-password' => 'required|min:6|confirmed',
          'new-password_confirmation' => 'required',
      ]);
    }

    private function changeData ($data) {
      Auth::user()->fill([
        'firstName' => $data['firstName'],
        'lastName' => $data['lastName'],
        'address' => $data['address'],
        'phone' => $data['phone'],
      ]);

      $this->savePicture($data);

      Auth::user()->save();

    }

    protected function savePicture($data) {
      $user = Auth::user();
      if (isset($_FILES['profilePicInput']) && $_FILES['profilePicInput']['name'] !== '') {
  			$info = pathinfo($_FILES['profilePicInput']['name']);
  			$extension =  $info['extension'];
  			$newName = $user->id . '.' . $extension;
  			$route = 'images/users/profilePictures/users'.$newName;
        $this->removeLastPicture($user);
  			move_uploaded_file($_FILES['profilePicInput']['tmp_name'], $route);
  			unset($_FILES['profilePicInput']);
  			$user->profilePicture = $route;
  		}
    }

    private function removeLastPicture($user){
      $defaultImg = $user->profilePicture;
      $default = explode("/", $defaultImg);
      if ($default[2] !== 'avatars') {
        unlink($user->profilePicture);
      }
    }

    private function changePassword ($data) {

      Auth::user()->fill([
        'password' => bcrypt($data['new-password']),
      ])->save();
    }

}
