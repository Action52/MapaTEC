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

    //Perform the search
    $finalSearchString = '%' . $searchString . '%';
    $projects = \DB::select(
      \DB::raw(
        "SELECT projects.id AS id, projects.name AS name, projects.description AS description
        FROM projects, project_has_category, categories
        WHERE
          (projects.name LIKE '$finalSearchString' AND projects.id = project_has_category.project_id AND categories.id = project_has_category.category_id) OR
          (projects.description LIKE '$finalSearchString' AND projects.id = project_has_category.project_id AND categories.id = project_has_category.category_id) OR
          (projects.id = project_has_category.project_id AND
            categories.id = project_has_category.category_id AND
            categories.name LIKE '$finalSearchString')"
        )
    );

    
    return \View::make('results', compact('projects', 'searchString'));
  }


}
