<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\project;
use App\User;
class ProjectController extends Controller
{
    //

    public function index(){
      //get all the projects
      $user = \Auth::user();
      $id = $user->id;
      //Seleccionar los proyectos del usuario

      $projects = \DB::select(\DB::raw("SELECT projects.id AS id, projects.name AS name, projects.description AS description
        FROM projects, users, project_has_user
        WHERE users.id = '$user->id'
        AND project_has_user.id = '$user->id'
        AND projects.id = project_has_user.project_id"));
      //Obtener la info de cada proyecto

      //Load the view and pass the nerds with alias projects

      //return view('crudproyectos.index')->with('projects',$projects);
      return \View::make('crudproyectos.index')->with('projects', $projects);
    }

    /*
      Show the form for creating a new resource

      Return: response
    */
    public function create(){

    }

    /*
      Store a newly created resource in storage.

      Return: response
    */
    public function store(Request $request){

    }

    /*
      Show a specified resource
      param : int $id
      Return: response
    */
    public function show($id){
      //Dado que hay muchas relaciones, hay que hacer varias queries

      //Info del proyecto
      $project = project::find($id)->first();

      //Proyecto y sus strategic partners
      $strategicpartners = \DB::select(
        \DB::raw(
          "SELECT strategicpartners.name AS name, strategicpartners.email AS email, strategicpartners.private_or_public AS private_or_public
            FROM strategicpartners, project_has_strategicpartner, projects
            WHERE strategicpartners.id = project_has_strategicpartner.sp_id AND
              project_has_strategicpartner.project_id = '$id' AND
              project_has_strategicpartner.project_id = projects.id"
          )
      );

      //Proyecto y usuarios
      $users = \DB::select(
        \DB::raw(
          "SELECT users.name AS name, users.lastname AS lastname, users.email as email, project_has_user.owner AS owner, project_has_user.role AS role
          FROM users, project_has_user, projects
          WHERE users.id = project_has_user.user_id AND
            project_has_user.project_id = '$id' AND
            project_has_user.project_id = projects.id"
          )
      );

      //Proyecto y campus
      $campuses = \DB::select(
        \DB::raw(
          "SELECT campuses.name
          FROM campuses, project_has_campus, projects
          WHERE campuses.id = project_has_campus.campus_id AND
          project_has_campus.project_id = '$id' AND
          project_has_campus.project_id = projects.id"
          )
      );

      //Proyecto y categoria
      $categories = \DB::select(
        \DB::raw(
          "SELECT categories.name
          FROM categories, project_has_category, projects
          WHERE categories.id = project_has_category.category_id AND
          project_has_category.project_id = '$id' AND
          project_has_category.project_id = projects.id"
          )
      );

      //Proyecto y tiempo
      $times = \DB::select(
        \DB::raw(
          "SELECT times.sem_start, times.year_start, times.sem_end, times.year_end
          FROM times, project_has_time, projects
          WHERE times.id = project_has_time.time_id AND
          project_has_time.project_id = 1 AND
          project_has_time.project_id = projects.id"
          )
      );

      //Proyecto y carreras
      $majors = \DB::select(
        \DB::raw(
          "SELECT majors.name, majors.aka, majors.program
          FROM majors, project_has_major, projects
          WHERE majors.id = project_has_major.major_id AND
          project_has_major.project_id = '$id' AND
          project_has_major.project_id = projects.id"
          )
      );

      //Proyecto y cursos
      $courses = \DB::select(
        \DB::raw(
          "SELECT courses.name, courses.code
          FROM courses, project_has_course, projects
          WHERE courses.id = project_has_course.id AND
          project_has_course.project_id = '$id' AND
          project_has_course.project_id = projects.id"
          )
      );


      //Proyecto y puntos
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

      return \View::make('crudproyectos.show',compact('project', 'strategicpartners', 'users', 'campuses', 'categories', 'times', 'majors', 'courses', 'points'));
    }

    /*
      Show the form for editing the specified resource
      param: int $id
      Return: response
    */
    public function edit($id){

    }

    /*
      Update the specified resource in storage
      param: int $id
      Return: response
    */
    public function update(Request $request, $id){


    }

    /*
      Remove the specified resource form storage
      param int $id
      Return: response
    */
    public function destroy($id){
      $project = project::find($id);
      $project->delete();

      \Session::flash('message', 'Proyecto eliminado exitosamente.');
      return \Redirect::to('crudproyectos');

    }

}
