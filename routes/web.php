<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/ 
    
Route::get('/', function () {
    return view('pages.home');
});
Route::get('/about', function () {
    return view('pages.about');
}); 
Route::get('/electionlist','electionlistController@electionlist');
Route::get('/{election_id}/{election_status}','electionentryController@electionentry');
 
Route::post('formfillup/{id}', ['as'=>'formfill', 'uses' => 'VotercheckController@votercheck']);

Route::get('test/{id}/{status}','electionentryController@electionentry');
 
Route::get('/loginform', function () { 
    return view('loginpage test');
});

Route::post('/votesubmit','votesubmitController@votesubmit'); 

Route::get("file",'testing@index');
Route::post("store",'testing@store');
Route::get("show",'testing@showall');

Route::get('/imageselection', function () {
    return view('image selection');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
