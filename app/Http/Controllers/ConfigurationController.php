<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Configuration;

class ConfigurationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
      $config = Configuration::getConfig();
      return view('admin/form_configuration')->with('config', $config);
    }
    public function store(Request $request){
      $config = new Configuration();
      $config->telephone = $request->input('telephone');
      $config->cellphone = $request->input('cellphone');
      $config->address = $request->input('address');
      $config->from_email = $request->input('from_email');
      $config->home_text = $request->input('home_text');

      $config->save();
      return redirect('admin/configuration')->with('success', 1);
    }
}
