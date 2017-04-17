<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class campus extends Model
{
    //

    public static function myLatLongs(){
      $latlongs = App\campus::all(); //Retrieve all data from table
      foreach ($latlongs as $latlong) {
        echo $latlong->geom;
      }
    }
}
