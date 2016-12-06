<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $numberOfRols = Auth::user()->numberOfRols();

        if ($numberOfRols == 1){

          if (Auth::user()->parentRol) return redirect()->action('ParentController@log');
          if (Auth::user()->schoolRol) return redirect()->action('SchoolController@log');
          if (Auth::user()->teacherRol) return redirect()->action('TeacherController@log');

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
        return redirect('/home/profile/edit/school');

      }else if ($result == 'parent'){
        Auth::user()->parentRol = 1;
        Auth::user()->save();

      }else{
        return view ('errors.403');
      }

      return redirect('/home');

    }

}
