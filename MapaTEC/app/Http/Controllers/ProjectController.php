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
