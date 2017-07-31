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

    //Devuelve un punto o puntos asociados a un proyecto
    public static function getPoint($id){
      $points = \DB::select(
        \DB::raw(
          "SELECT locations.id, points.name, ST_X(points.geom) AS lat, ST_Y(points.geom) AS lon
              FROM points, location_has_point, locations, projects, project_has_location
              WHERE
              points.id = location_has_point.point_id AND
              locations.id = location_has_point.location_id AND
              locations.id = project_has_location.location_id AND
              projects.id = project_has_location.project_id AND
              projects.id = '$id'
          ")
      );
      return $points;
    }
}
