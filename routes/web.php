<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;


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
Route::redirect('/',URL::To('/Employeur/loginFormEmployeur'));


// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('Admin')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
    //ADMIN
    Route::get('/indexAdmin', 'AdministrateurController@index')->name('indexAdmin')->middleware('auth');
    Route::post('/storeAdmin', 'AdministrateurController@store')->name('storeAdmin')->middleware('auth');
    //END ADMIN
    //EMPLOYEUR
    Route::get('/indexEmployeur', 'AdministrateurController@indexEmployeur')->name('indexEmployeurAdmin')->middleware('auth');
    Route::post('/updateEmployeur/{id}', 'AdministrateurController@updateEpmloyeur')->name('UpdateEmployeur')->middleware('auth');
    Route::post('mailEmployeur', 'AdministrateurController@mailEmployeur')->name('mailEmployeur')->middleware('auth');
    //END EMPLOYEUR
    //ENTREPRISE
    Route::get('/indexEntreprise', 'EntrepriseController@index')->name('indexEntreprise')->middleware('auth');
    Route::post('/storeEntreprise', 'EntrepriseController@store')->name('storeEntreprise')->middleware('auth');
    Route::post('/updateEntreprise/{id}', 'EntrepriseController@update')->name('updateEntreprise')->middleware('auth');
    Route::post('/deleteEntreprise/{id}', 'EntrepriseController@destroy')->name('deleteEntreprise')->middleware('auth');
    Route::get('/filtreEntreprise', 'EntrepriseController@filtreEntreprise')->name('filtreEntreprise')->middleware('auth');
    //END ENTREPRISE

    //profile Admin
    Route::get('/profileAdmin', 'AdministrateurController@profileAdmin')->name('profileAdmin')->middleware('auth');;
    //end profile admin
});

Auth::routes(['verify' => true]);


Route::prefix('Employeur')->group(function(){

    Route::get('/index', 'EmployeurController@index')->name('indexEmployeur')->middleware('auth:employeur');
    Route::post('/LogoutEmployeur', 'AuthEmployeur\LoginController@LogoutEmployeur')->name('LogoutEmployeur');
    Route::get('/loginFormEmployeur', 'AuthEmployeur\LoginController@showLoginFormEmployeur')->name('employeur.login');
    Route::post('/loginEmployeur', 'AuthEmployeur\LoginController@loginEmployeur')->name('loginEmployeur');
    Route::get('/registreEmployeur', 'EmployeurController@registreEmployeur');
    Route::post('/registreEmployeur', 'EmployeurController@registreEmployeur')->name('registreEmployeur');
    Route::get('/verify','EmployeurController@verifyEmployeur')->name('verifyEmployeur');
    Route::get('/profileEmployeur','EmployeurController@profileEmployeur')->name('profileEmployeur')->middleware('auth:employeur');
    Route::get('/showProfile','EmployeurController@showProfile')->name('showProfileEmployeur')->middleware('auth:employeur');
    Route::post('/UpdatepProfileEmployeur/{id}','EmployeurController@updateProfile')->name('UpdatepProfileEmployeur')->middleware('auth:employeur');
});



Auth::routes();


