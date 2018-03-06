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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('projects')->group(function () {
    Route::get('/', 'ProjectsController@index')->name('projects');
    Route::get('add', 'ProjectsController@addProject')->name('add-project');
    Route::post('add', 'ProjectsController@saveProject')->name('save-project');
    Route::get('delete/{id}', 'ProjectsController@deleteProject')->name('delete-project');
    Route::get('edit/{id}', 'ProjectsController@editProject')->name('edit-project');
    Route::post('edit', 'ProjectsController@updateProject')->name('update-project');
    Route::get('view/{id}', 'ProjectsController@viewProject')->name('view-project');
});

Route::prefix('users')->middleware(['admin'])->group(function () {
    Route::get('index', 'UserController@index')->name('users');
    Route::get('add', 'UserController@addUser')->name('add-user');
    Route::post('add', 'UserController@saveUser')->name('save-user');
    Route::get('delete/{id}', 'UserController@deleteUser')->name('delete-user');
    Route::get('edit/{id}', 'UserController@editUser')->name('edit-user');
    Route::post('edit', 'UserController@updateUser')->name('update-user');
});
