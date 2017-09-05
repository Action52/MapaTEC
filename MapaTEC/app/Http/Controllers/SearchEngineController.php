<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\project;
use App\strategicpartner;
use App\User;
use App\location;
use App\campus;
use App\category;
use App\course;
use App\major;
use App\country;
use App\state;
use App\city;

class SearchEngineController extends Controller
{
  /*
    Search projects that meet the search specifications
  */
  public function search(Request $request){
    //Assure string is pure
    $searchString = stripslashes($request->input('busqueda'));
    $projects = 0;
    //Perform the search
    $finalSearchString = '%' . $searchString . '%';
    if(strcmp($finalSearchString, "%%") == 0){
      $projects = \DB::select(
        \DB::raw(
          "SELECT projects.id AS id, projects.name AS name, projects.description AS description, ST_X(points.geom) AS lat, ST_Y(points.geom) AS lon
          FROM projects, project_has_location, location_has_point, locations, points
          WHERE
                  project_has_location.project_id = projects.id
              AND project_has_location.location_id = locations.id
              AND location_has_point.location_id = locations.id
              AND location_has_point.point_id = points.id
            "
          )
      );
    }
    else{
      $projects = \DB::select(
        \DB::raw(
          "SELECT projects.id AS id, projects.name AS name, projects.description AS description, ST_X(points.geom) AS lat, ST_Y(points.geom) AS lon
          FROM projects, project_has_category, categories, project_has_location, location_has_point, locations, points
          WHERE
            (projects.name LIKE '$finalSearchString'
              AND projects.id = project_has_category.project_id
              AND categories.id = project_has_category.category_id
            ) OR
            (projects.description LIKE '$finalSearchString'
              AND projects.id = project_has_category.project_id
              AND categories.id = project_has_category.category_id
            ) OR
            (projects.id = project_has_category.project_id
              AND categories.id = project_has_category.category_id
              AND categories.name LIKE '$finalSearchString'
            )
            AND project_has_location.project_id = projects.id
            AND project_has_location.location_id = locations.id
            AND location_has_point.location_id = locations.id
            AND location_has_point.point_id = points.id
            "
          )
      );
    }
    return \View::make('results', compact('projects', 'searchString'));
  }


}
