<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numberOfRols = $this->numberOfRols();

        if ($numberOfRols == 1){

          if (Auth::user()->parentRol) return view('private.feed.parent');
          if (Auth::user()->schoolRol) return view('private.feed.school');
          if (Auth::user()->teacherRol) return view ('private.feed.teacher');

        }else if ($numberOfRols > 1){
          
          return view('private.rol.login');
        }

        return view('private.rol.chooser');

    }

    public function chooseRol (Request $request) {

      $result = $request->input('choose-input');

      if ($result == 'teacher'){
        Auth::user()->teacherRol = 1;
        Auth::user()->save();

      }else if ($result == 'school'){
        Auth::user()->schoolRol = 1;
        Auth::user()->save();

      }else if ($result == 'parent'){
        Auth::user()->parentRol = 1;
        Auth::user()->save();

      }else{
        return view ('errors.403');
      }

      return redirect('/home');

    }

    private function numberOfRols (){
      $count = 0;

      if (Auth::user()->parentRol){
        $count++;
      }
      if (Auth::user()->schoolRol){
        $count++;
      }
      if (Auth::user()->teacherRol){
        $count++;
      }

      return $count;
    }

}
