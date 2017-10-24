<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Para crud de proyectos
Route::resource('crudproyectos', 'ProjectController');

Route::resource('user', 'UserController');

Route::get('deleteUser/{id}', 'UserController@destroy');

Route::get('/', function()
{
    return View::make('welcome');
});
Route::get('about', function()
{
    return View::make('pages.about');
});
Route::get('projects', function()
{
    return View::make('pages.projects');
});
Route::get('contact', function()
{
    return View::make('pages.contact');
});
Route::get('pr', function()
{
    return View::make('pages.pr');
});



Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');

Route::post('user/{id}/contactUser', 'UserController@contactUser');

Route::get('search', 'SearchEngineController@search');

Route::get('advancedSearch', 'SearchEngineController@advancedSearch');