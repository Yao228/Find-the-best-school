<?php

use App\Mail\ContactMessageCreated;


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

/* Route::get('/', function () {
    return view('/frontend');
}); */

Route::get('/', 'FrontendController@index')->name('frontend');
Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::post('/contact', 'FrontendController@contactstore')->name('contactstore');
Route::get('/a-propos', 'FrontendController@about')->name('a-propos');
Route::get('/liste-ecoles', 'FrontendController@listecoles')->name('liste-ecoles');
Route::get('/satuts/{statut}', 'FrontendController@statut')->name('statuts');
Route::get('/types/{type}', 'FrontendController@type')->name('types');
Route::get('ecole/{school}', 'FrontendController@show')->name('details');
Route::post('ecole/{school}/create_rating', 'FrontendController@create_rating')->name('create_rating');
Route::get('location', 'FrontendController@location')->name('location');
Route::get('schoolname', 'FrontendController@schoolname')->name('schoolname');

/* Auth::routes(['verify' => true]); */


/* Route::get('/home', function () {
    return view('home');
})->middleware('verified'); */

Auth::routes();
        

Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard', 'Dashboard\HomeController@index')->name('dashboard');
    /* Route::get('/dashboard', 'Dashboard\HomeController@userinfo')->name('userinfo'); */
    Route::resource('/dashboard/schools', 'Dashboard\SchoolController');
    Route::get('trashed-schools', 'Dashboard\SchoolController@trashed')->name('trashed-schools.index');
    Route::put('restore-school/{school}', 'Dashboard\SchoolController@restore')->name('restore-schools');
    Route::put('/dashboard/users/profile', 'Dashboard\UsersController@update')->name('users.update-profile');
    Route::get('/dashboard/users/profile', 'Dashboard\UsersController@edit')->name('users.edit-profile');
    Route::resource('/dashboard/examens', 'Dashboard\ExamenController');
    Route::resource('/dashboard/fraisinscriptions', 'Dashboard\FraisinscriptionController');
    Route::resource('/dashboard/galeries', 'Dashboard\GaleriesController');
    Route::get('/add-school', 'FrontendController@addschool')->name('addschool');
    Route::post('/add-school', 'FrontendController@saveschool')->name('saveschool');

});

// Accès autorisé uniquement aux admins
Route::middleware(['auth', 'admin'])->group(function(){
    Route::resource('/dashboard/statuts', 'Dashboard\StatutController');
    Route::resource('/dashboard/types', 'Dashboard\TypeController');
    Route::resource('/dashboard/villes', 'Dashboard\VilleController');
    Route::resource('/dashboard/quartiers', 'Dashboard\QuartierController');
    Route::resource('/dashboard/lesexamens', 'Dashboard\LesexamensController');
    Route::get('/dashboard/users', 'Dashboard\UsersController@index')->name('users.index');
    Route::post('users/{user}/make-admin', 'Dashboard\UsersController@makeAdmin')->name('users.make-admin');
});

// Social auth
Route::get('/redirect/{service}', 'SocialAuthController@redirect');
Route::get('/callback/{service}', 'SocialAuthController@callback');
