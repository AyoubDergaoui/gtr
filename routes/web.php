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

use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckApproved;

Route::get('/', 'WelcomeController@index');

Auth::routes();


// UNVERIFIED USERS
Route::middleware(['auth'])->group(function() {
  Route::get('/needs_approval', 'HomeController@needs_approval')->name('needs_approval');
});

// USERS ROUTES
Route::middleware(['auth', CheckApproved::class])->group(function() {
  Route::get('/home', 'HomeController@index')->name('home');

  Route::resource('personnels', 'PersonnelsController');
  Route::resource('engins', 'EnginesController');

  Route::get('/concasseur', 'ConcasseurController@index')->name('concasseur');

  Route::prefix('/concasseur')->name('concasseur.')->group(function () {
    Route::resource('personnel-gtr', 'ConcasseurPersonnelGTRController');
    Route::resource('personnel-interimaire', 'ConcasseurPersonnelInterimaireController');

  });
});

// ADMINS ROUTES
Route::middleware(['auth', CheckApproved::class, CheckAdmin::class])->group(function() {
  Route::get("/pending_users", 'PendingUsersController@index')->name("pending_users");
  Route::post("/accept_user/{user}", 'PendingUsersController@accept')->name("accept_user");
  Route::delete("/reject_user/{user}", 'PendingUsersController@reject')->name("reject_user");

  Route::get("/add_admins", 'AddAdminsController@index')->name("add_admins");
  Route::post("/add_admins/{user}", 'AddAdminsController@add')->name("add_admin");
});
