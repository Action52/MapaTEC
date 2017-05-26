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
      $id = \Session::getId();
      $projects = project::where();

      //Load the view and pass the nerds with alias nerds

      return \View::make('crudproyectos.index')->with('nerds',$nerds);
    }

    /*
      Show the form for creating a new resource

      Return: response
    */
    public function create(){
      return \View::make('nerds.create');
    }

    /*
      Store a newly created resource in storage.

      Return: response
    */
    public function store(Request $request){
      //Validate

      $rules = array(
        'name' => 'required',
        'email' => 'required|email',
        'nerd_level' => 'required|numeric'
      );

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails()){
        return Redirect::to('nerds/create')
          ->withErrors($validator)
          ->withInput();
      }
      else{
        $nerd = new Nerd;
        $nerd->name = $request->input('name');
        $nerd->email = $request->input('email');
        $nerd->nerd_level = $request->input('nerd_level');
        $nerd->save(); //Estos son metodos del MODELO

        \Session::flash('message', 'Successfully created nerd!');

        return \Redirect::to('nerds');
      }
    }

    /*
      Show a specified resource
      param : int $id
      Return: response
    */
    public function show($id){
      //Get the nerd
      $nerd = Nerd::find($id);

      return \View::make('nerds.show')->with('nerd', $nerd);
    }

    /*
      Show the form for editing the specified resource
      param: int $id
      Return: response
    */
    public function edit($id){
      //Get the nerd
      $nerd = Nerd::find($id);

      return \View::make('nerds.edit')->with('nerd', $nerd);
    }

    /*
      Update the specified resource in storage
      param: int $id
      Return: response
    */
    public function update(Request $request, $id){
      $rules = array(
        'name' => 'required',
        'email' => 'required|email',
        'nerd_level' => 'required|numeric'
      );

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails()){
        return Redirect::to('nerds/' . $id . '/edit')
          ->withErrors($validator)
          ->withInput();
      }
      else{
        $nerd = Nerd::find($id);
        $nerd->name = $request->input('name');
        $nerd->email = $request->input('email');
        $nerd->nerd_level = $request->input('nerd_level');
        $nerd->save(); //Estos son metodos del MODELO

        \Session::flash('message', 'Successfully updated nerd!');

        return \Redirect::to('nerds');
      }

    }

    /*
      Remove the specified resource form storage
      param int $id
      Return: response
    */
    public function destroy($id){
      $nerd = Nerd::find($id);
      $nerd->delete();

      \Session::flash('message', 'Successfully deleted the nerd!');
      return \Redirect::to('nerds');

    }

}
