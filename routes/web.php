<?php

use Illuminate\Support\Facades\Route;

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



/* rotte schede personali
  Route::get('/profilo/schedePersonali', ['as'=>'schedePersonali', 'uses'=> 'App\Http\Controllers\SchedePersonaliController@getSchedePersonali']);
  Route::get('/profilo/schedePersonali', ['as'=>'schedePersonali', 'uses'=> 'App\Http\Controllers\SchedePersonaliController@getSchedePersonali']);
 */


Route::group(['middleware' => ['lang']], function() {
    Route::get('/', ['uses' => 'App\Http\Controllers\FrontController@getHome']);
    Route::get('/home', ['as' => 'home', 'uses' => 'App\Http\Controllers\FrontController@getHome']);
    Route::get('/lang/{language}', ['as' => 'setLang', 'uses' => 'App\Http\Controllers\LangController@changeLanguage']);

    /*rotte login/register
    Route::get('/user/login', ['as' => 'user.login', 'uses' => 'App\Http\Controllers\AuthController@authentication']);
    Route::post('/user/login', ['as' => 'user.login', 'uses' => 'App\Http\Controllers\AuthController@login']);
    Route::get('/user/logout', ['as' => 'user.logout', 'uses' => 'App\Http\Controllers\AuthController@logout']);
    Route::post('/user/register', ['as' => 'user.register', 'uses' => 'App\Http\Controllers\AuthController@registration']);
     */
    //rotte generali 
    Route::get('/esercizi/corpoLibero', ['as' => 'corpoLibero', 'uses' => 'App\Http\Controllers\CorpoLiberoController@getPage']);
    Route::get('/esercizi/fondamentali', ['as' => 'fondamentali', 'uses' => 'App\Http\Controllers\FondamentaliController@getPage']);
    Route::get('/esercizi/complementari', ['as' => 'complementari', 'uses' => 'App\Http\Controllers\ComplementariController@getPage']);
    Route::get('/calcolatrici', ['as' => 'calcolatrici', 'uses' => 'App\Http\Controllers\CalcolatriciController@getPage']);
    Route::get('/schede', ['as' => 'schede', 'uses' => 'App\Http\Controllers\SchedeController@getPage']);
    Route::get('/timer', ['as' => 'timer', 'uses' => 'App\Http\Controllers\TimerController@getPage']);
    
    Auth::routes();
});


Route::group(['middleware' => ['auth', 'lang']], function() {
    //rotte profilo
    Route::get('/profilo', ['as' => 'profilo', 'uses' => 'App\Http\Controllers\ProfiloController@getProfile']);
    Route::get('/profilo/edit', ['as' => 'editProfilo', 'uses' => 'App\Http\Controllers\ProfiloController@getEditProfile']);
    Route::post('/profilo/edit', ['as' => 'editProfilo', 'uses' => 'App\Http\Controllers\ProfiloController@editProfile']);

    //rotte schede personali
    Route::get('/profilo/schedePersonali/delete/{id}/confirm', ['as' => 'schedaDeleteConfirmation', 'uses' => 'App\Http\Controllers\SchedePersonaliController@confirmDelete']);
    Route::get('/profilo/schedePersonali', ['as' => 'schedePersonali', 'uses' => 'App\Http\Controllers\SchedePersonaliController@getPage']);
    Route::post('/profilo/schedaPersonale/{nomeScheda}/create', ['as' => 'schedaPersonaleCreate', 'uses' => 'App\Http\Controllers\SchedePersonaliController@create']);

    //rotte scheda personale
    Route::get('/profilo/schedaPersonale/{id}/edit', ['as' => 'schedaPersonaleEdit', 'uses' => 'App\Http\Controllers\SchedaPersonaleController@edit']);
    Route::post('/profilo/schedaPersonale/{id}/edit', ['as' => 'schedaPersonaleEdit', 'uses' => 'App\Http\Controllers\SchedaPersonaleController@saveEdit']);
    Route::get('/profilo/schedaPersonale/{idScheda}/{idEsercizio}/edit', ['as' => 'schedaPersonaleEditDelete', 'uses' => 'App\Http\Controllers\SchedaPersonaleController@deleteEsercizio']);
    Route::get('/profilo/schedaPersonale/{id}', ['as' => 'schedaPersonalePage', 'uses' => 'App\Http\Controllers\SchedaPersonaleController@getPage']);
    Route::get('/profilo/schedaPersonale/{nomeScheda}/create', ['as' => 'schedaPersonaleGetCreate', 'uses' => 'App\Http\Controllers\SchedaPersonaleController@getCreatePage']);
});
