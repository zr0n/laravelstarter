<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    //
    public static function getConfig($configName = false){
      $config = Self::orderBy('id', 'desc')->take(1)->get()->first(); //get the last
      if(!$config->count()){
        return new Self;
      }
      if(!$configName){
        return $config;
      }
      return $config->{$configName};
    }
}
