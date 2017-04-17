<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\campus;
class CampusController extends Controller
{
  public static function myLatLongs(){
    $latlongs = App\campus::all(); //Retrieve all data from table
    foreach ($latlongs as $latlong) {
      echo $latlong->geom;
    }
  }
}
