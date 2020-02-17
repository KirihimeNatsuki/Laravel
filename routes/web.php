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

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin_area', ['middleware' => 'admin', function () {
    //
}]);

Route::get('liste', 'ListUsers@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('skills','SkillsController');

Route::resource('skills_user','UserSkillsController')->middleware('auth');

/*Route::resource('skills', 'SkillsController')->except([
      'show', 'index',
])->middleware('can:manage', $skills);

Route::resource('skills', 'SkillsController')->only(['show'])->middleware('can:view', $skills);*/
