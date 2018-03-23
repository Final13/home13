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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('projects')->group(function () {
    Route::get('index', 'ProjectsController@index')->name('projects');
    Route::get('add', 'ProjectsController@addProject')->middleware(['admin'])->name('add-project');
    Route::post('add', 'ProjectsController@saveProject')->middleware(['admin'])->name('save-project');
    Route::get('delete/{id}', 'ProjectsController@deleteProject')->middleware(['admin'])->name('delete-project');
    Route::get('edit/{id}', 'ProjectsController@editProject')->middleware(['admin'])->name('edit-project');
    Route::post('edit', 'ProjectsController@updateProject')->middleware(['admin'])->name('update-project');
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

Route::prefix('events')->group(function ()
{
    Route::get('index', 'EventsController@index')->name('events');
    Route::get('add', 'EventsController@addEvent')->name('add-event');
    Route::post('add', 'EventsController@saveEvent')->name('save-event');
    Route::get('delete/{id}', 'EventsController@deleteEvent')->name('delete-event');
    Route::get('edit/{id}', 'EventsController@editEvent')->name('edit-event');
    Route::post('edit', 'EventsController@updateEvent')->name('update-event');
    Route::get('view/{id}', 'EventsController@viewEvent')->name('view-event');
});