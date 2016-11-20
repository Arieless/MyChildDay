<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index() {
      return view('public.index' , ['displayReg' => "none", 'displayLog' => "none"]); //
    }
    public function faq() {
      return view('public.faq',  ['displayReg' => "none", 'displayLog' => "none"]); //
    }
}
