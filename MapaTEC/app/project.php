<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    //Get all projects and store them in array
    public function getProjects(){
      $projects = project::all();
      return $projects;
    }

    //Get all project latitudes
    public function projectLatLong(){
      /*Para hacer esto hay que obtener TODAS las latitudes y longitudes de las tablas
      relacionales de localización: location_has_point, location_has_line,
      location_has_area.
      También tener en cuenta project_has_location.
      */

      //Saber el id del proyecto
      $projects = getProjects();
      
    }
}
