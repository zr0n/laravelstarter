<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Configuration;
use \App\Models\Gallery;

class HomeController extends Controller
{
    //
    public function index(){
      $homeContent = [
        'gallery' => Gallery::all(),
        'config' => Configuration::getConfig()
      ];
      return view('home')->with($homeContent);
    }
}
