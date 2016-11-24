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

          $this->sendToAccurateRol();

        }else if ($numberOfRols > 1){
          return view('private.rol.login');
        }

        return view('private.rol.chooser');


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
        return view('private.parent');
      }

      if (Auth::user()->schoolRol){
        return view('private.school');
      }

      if (Auth::user()->teacherRol){
        return view ('private.teacher');
      }
    }
}
