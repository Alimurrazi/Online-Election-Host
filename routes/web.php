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
Route::get('/congratulation',function()
{
	return view('congratulation');
});

Route::get('/electioncreate','electioncreateController@electioncreate');
Route::post('/electiondata','electiondataController@datasubmit');
Route::post('/electioncandidate','electioncandidateController@datasubmit'); 
Route::post('/electionvoter','electionvoterController@datasubmit'); 

Route::get("file",'testing@index');
Route::post("store",'testing@store');
Route::get("show",'testing@showall'); 

Route::get('/myelection','MyelectionController@findelection');
Route::get('we/see/{id}','UpdateController@UpdateElection');
Route::get('my/list/{id}/Fundamental','FundamentalUpdateController@show');
Route::post('my/Fundamental/Update','FundamentalUpdateController@update');
Route::get('my/Fundamental/Delete/{id}','FundamentalUpdateController@delete');

Route::get('my/list/{id}/Post','PostUpdateController@show');
Route::post('my/Post/Update','PostUpdateController@update');
Route::get('my/Post/Delete/{id}','PostUpdateController@delete');

Route::get('my/list/{id}/Candidate','CandidateUpdateController@show');
Route::post('my/Candidate/Update','CandidateUpdateController@update');
Route::get('my/Candidate/Delete/{id}','CandidateUpdateController@delete');

Route::get('my/list/{id}/Voter','VoterUpdateController@show');
Route::post('my/Voter/Update','VoterUpdateController@update');
Route::get('my/Voter/Delete/{id}','VoterUpdateController@delete');

Route::get('/update',function()
{
	return view('update');
});

Route::get('/imageselection', function () { 
    return view('image selection'); 
});

Route::get('/bar', function () {
    return view('bar'); 
});

Route::get('/send', 'EmailController@send');

Auth::routes();

Route::get('/home', 'HomeController@index');
 