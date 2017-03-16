<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use \App\Models\Configuration;
use \App\Models\Gallery;
use \App\Mail\Contact;

class HomeController extends Controller
{
    //
    public function __construct(){
      $this->config = Configuration::getConfig();
    }
    public function index(){
      $homeContent = [
        'gallery' => Gallery::all(),
        'config' => $this->config
      ];
      return view('home')->with($homeContent);
    }
    public function contact(Request $request){
      $client = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'msg' => $request->input('message')
      ];

      try{
        Mail::to($this->config->from_email)
          ->send(new Contact($client));
      }
      catch(Exception $e){
        return response($e->getMessage(), 500);
      }
      return response('Ok', 200);
    }
}
