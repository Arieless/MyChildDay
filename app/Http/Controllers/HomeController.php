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

          sendToRol();

        }else if ($numberOfRols > 1){
          return view('private.rolLogin', [
                                      'parentRol' => Auth::user()->parentRol,
                                      'schoolRol' => Auth::user()->schoolRol,
                                      'teacherRol' => Auth::user()->teacherRol,
                                    ]);
        }

        return view('private.rolChooser', [
                                    'parentRol' => Auth::user()->parentRol,
                                    'schoolRol' => Auth::user()->schoolRol,
                                    'teacherRol' => Auth::user()->teacherRol,
                                  ]);


        return view('private.home');
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

    private function sendToAccurateRol(){

      if (Auth::user()->parentRol){
        return view('private.homeParent');
      }

      if (Auth::user()->schoolRol){
        return view('private.homeSchool');
      }

      if (Auth::user()->teacherRol){
        return view ('private.homeTeacher');
      }
    }
}
