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
class ProjectController extends Controller
{
    //
    public function index(){
      //get all the projects
      $user = \Auth::user();
      $id = $user->id;
      //Seleccionar los proyectos del usuario
      $projects = \DB::select(\DB::raw("SELECT projects.id AS id, projects.name AS name, projects.description AS description, projects.has_pic AS has_pic
        FROM projects, users, project_has_user
        WHERE users.id = '$user->id'
        AND project_has_user.user_id = '$user->id'
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
      //Load strategicpartners
      $strategicpartners = strategicpartner::all();
      //Load users
      $users = User::all();
      //Load campuses
      $campuses = campus::all();
      //Load courses
      $courses = course::all();
      //Load majors
      $majors = major::all();
      //Load countries
      $countries = country::all();
      //Load states
      $states = state::all();
      //Load cities
      $cities = city::all();
      //Send the view with new info
      return \View::make('crudproyectos.create', compact('strategicpartners', 'users', 'campuses', 'courses','majors','countries', 'states', 'cities'));
    }
    /*
      Store a newly created resource in storage.
      Return: response
    */
    public function store(Request $request){
        $proyecto = new project;
        $proyecto->name = $request->name;
        $proyecto->description = $request->description;
        $proyecto->status = $request->status;
        //nota estoy tomando en proceso como 1 y terminado como 0
        $proyecto->pdf = "en proceso";
        $userInfo=\Auth::user()->id;
        $idProyecto=$proyecto->id;
        //Proyecto y sus strategic partners
        \DB::table('project_has_user')->insert(['project_id' => $idProyecto, 'user_id' => $userInfo,'owner'=> 't','role'=>'Lider']);
        if ($request->sp_id!=null) {
          \DB::table('project_has_strategicpartner')->insert(['project_id' => $idProyecto, 'sp_id' => $request->sp_id]);
        }
        if ($request->category_id!=null) {
          \DB::table('project_has_category')->insert(['project_id' => $idProyecto, 'category_id' => $request->category_id]);
        }
        if ($request->campus!=null) {
         \DB::table('project_has_campus')->insert(['project_id' => $idProyecto, 'campus_id' => $request->campus]);
        }
        if($proyecto->has_pic == 1){ //el usuario ya tiene imagen de perfil
          $proyecto->has_pic = 0; //Para que si ocurre un error se ponga la predeterminada
          File::delete($proyecto->id . '.png'); //borra la vieja
        }
        if($request->file('imagen')->isValid()){ //revisar que la imagen sea valida
          $destinationPath = 'img/projects';
          $extension = $request->file('imagen')->getClientOriginalExtension();
          $fileName = $proyecto->id . '.' . $extension;
          $request->file('imagen')->move($destinationPath, $fileName);
          $proyecto->has_pic = 1;
          $proyecto->save();
        }
        else{
          return \Redirect::to('crudproyectos/create')
            ->withErrors($validator)
            ->withInput();
        }
        \Session::flash('message', 'Proyecto agreagado exitosamente.');
      return \Redirect::to('crudproyectos');
    }
    /*
      Show a specified resource
      param : int $id
      Return: response
    */
    public function show($id){
      //Dado que hay muchas relaciones, hay que hacer varias queries
      //Info del proyecto
      $project = project::find($id);
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
          "SELECT users.id AS id, users.name AS name, users.lastname AS lastname, users.email as email, users.has_profile_pic AS has_profile_pic,project_has_user.owner AS owner, project_has_user.role AS role
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
      //project
      $project = project::find($id);
      //Load strategicpartners
      $strategicpartners = strategicpartner::all();
      //Load users
      $users = User::all();
      //Load campuses
      $campuses = campus::all();
      //Load courses
      $courses = course::all();
      //Load majors
      $majors = major::all();
      //Load countries
      $countries = country::all();
      //Load states
      $states = state::all();
      //Load cities
      $cities = city::all();
      //Send the view with new info
      return \View::make('crudproyectos.edit', compact('project', 'strategicpartners', 'users', 'campuses', 'courses','majors','countries', 'states', 'cities'));
    }
    /*
      Update the specified resource in storage
      param: int $id
      Return: response
    */
    public function update(Request $request, $id){
      destroy($id);
      store($request);
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