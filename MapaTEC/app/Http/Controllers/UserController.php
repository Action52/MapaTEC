<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
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

class UserController extends Controller
{
    //

    public function index(){

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
      //Load users
      $user = User::find($id);



      //Send the view with new info
      return \View::make('user.edit')->with('user', $user);
    }

    /*
      Update the specified resource in storage
      param: int $id
      Return: response
    */
    public function update(Request $request, $id){
      echo "Yes";
      echo $id;
      echo $request['name'];

      $rules = array(
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users|is_itesm_mail',
        'password' => 'required',
        'c_password' => 'required|min:6|same:password'
      );


      $validator = Validator::make($request->all(), $rules);

      if($validator->fails()){
        return \Redirect::to('user/' . $id . '/edit')
          ->withErrors($validator)
          ->withInput();
      }
      else{
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save(); //Estos son metodos del MODELO

        \Session::flash('message', 'Successfully updated user!');

        return \Redirect::to('home');
      }

    }

    /*
      Remove the specified resource form storage
      param int $id
      Return: response
    */
    public function destroy($id){
      $user = User::find($id);
      $user->delete();

      \Session::flash('message', 'Usuario eliminado exitosamente.');

      route('logout');
      return \Redirect::to('login');

    }

}
