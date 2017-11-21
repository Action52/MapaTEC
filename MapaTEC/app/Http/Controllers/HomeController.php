<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = \DB::select(
        \DB::raw(
          "SELECT projects.id AS id, projects.name AS name, projects.description AS description, projects.latitud AS lat, projects.longitud AS lon
          FROM projects
            "
          )
      );
        $campuses = \DB::select(
          \DB::raw(
            "SELECT id, name FROM campuses"
            )
        );
        $majors = \DB::select(
          \DB::raw(
            "SELECT id, program FROM majors"
            )
        );
        return \View::make('home', compact('projects', 'campuses','majors'));
    }
}
