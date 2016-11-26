<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function index() {

      if (Auth::check()) {

        // The user is logged in...
        // Redirects to home

        return redirect()->intended('home');

      }else{

        // The user is not logged in...

        return view('public.index' , [
                                        'displayReg' => "none",
                                        'displayLog' => "none",
                                        'displayPassReset' => "none",
                                        'displayEmailReset' => "none",
                                        'displayContact' => "none"
                                      ]);
      }
    }

    public function faq() {

      return view('public.faq',  [
                                    'displayReg' => "none",
                                    'displayLog' => "none",
                                    'displayPassReset' => "none",
                                    'displayEmailReset' => "none",
                                    'displayContact' => "none"
                                  ]);
    }

    public function terms() {
      return view('public.terms', [
                                    'displayReg' => "none",
                                    'displayLog' => "none",
                                    'displayPassReset' => "none",
                                    'displayEmailReset' => "none",
                                    'displayContact' => "none"
                                  ]);
    }

    public function contact() {
      return view('public.index', [
                                    'displayReg' => "none",
                                    'displayLog' => "none",
                                    'displayPassReset' => "none",
                                    'displayEmailReset' => "none",
                                    'displayContact' => "block"
                                  ]);
    }

}
