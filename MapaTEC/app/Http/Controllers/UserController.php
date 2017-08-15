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
use \Input as Input;
use Mail;


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
      $user = User::find($id);

      $projects_user = \DB::select(
        \DB::raw("SELECT projects.id AS project_id, projects.name AS project_name, projects.has_pic AS has_pic
          FROM projects, users, project_has_user
          WHERE projects.id = project_has_user.project_id AND
                users.id = project_has_user.user_id AND
                users.id = '$id'
        ")
      );

      $categories_user = \DB::select(
        \DB::raw("SELECT categories.id AS id, categories.name AS name
          FROM categories, users, user_has_category
          WHERE categories.id = user_has_category.category_id AND
                users.id = user_has_category.user_id AND
                users.id = '$id'
        ")
      );

      //Send the view with new info
      return \View::make('user.show',compact('user','projects_user', 'categories_user'));
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
      echo $request->input('profile_img');
      $user = User::find($id);

      $rules = array(
        'name' => 'required|max:255',
        'password' => 'required',
        'c_password' => 'required|min:6|same:password',
        'profile_img' => 'required|max:4000' //maximo tamaño de imagen 4 megabytes
      );


      $validator = Validator::make($request->all(), $rules);

      if($validator->fails()){
        return \Redirect::to('user/' . $id . '/edit')
          ->withErrors($validator)
          ->withInput();
      }
      else{
        if($user->has_profile_pic == 1){ //el usuario ya tiene imagen de perfil
          $user->has_profile_pic = 0; //Para que si ocurre un error se ponga la predeterminada
          \File::delete('img/profilePics/'.$user->id . '.png'); //borra la vieja
        }
        if($request->file('profile_img')->isValid()){ //revisar que la imagen sea valida
          $destinationPath = 'img/profilePics';
          $extension = $request->file('profile_img')->getClientOriginalExtension();
          $fileName = $user->id . '.' . $extension;
          $request->file('profile_img')->move($destinationPath, $fileName);
          //\Image::make($destinationPath . $fileName)->resize(200,200)->save($destinationPath . $fileName);
          $user->has_profile_pic = 1;
        }
        else{
          return \Redirect::to('user/' . $id . '/edit')
            ->withErrors($validator)
            ->withInput();
        }

        $user->name = $request->input('name');
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

    public function contactUser(Request $request, $id){

      $user = User::findOrFail($id);

      \Session::flash('message', 'Correo enviado correctamente.');

      Mail::raw($request->input('contenido'), function($message) use ($user, $request){
        $message->from(\Auth::user()->email, \Auth::user()->name);
        $message->to($user->email, $user->name);
        $message->subject($request->input('asunto'));
      });

      return \Redirect::to('user/' . $user->id);
    }

}
