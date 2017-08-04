<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use Session;
use View;
 
class electiondataController extends Controller
{
    public function datasubmit()
    {
    //	return Input::get();
     //  $data=Input::get();
    //   echo $data->election_name;
      
      Session::put('Input1',Input::get());
      $data=Session::get('Input1'); 
      
    //  return $data;

      return view::make('candidatedata')->with('data',$data); 
/*
       foreach ($data as $data) {
        echo $data;
        echo "******";
        $i++;
       }
  */     
    //  return Session::get('Input1')->election_name;
    //  $data=Session::get('Input1');
    //  echo  $data['election_name'];

       /*
       DB::table('users')->insert(
      ['email' => 'john@example.com', 'votes' => 0]
       );
*/     
       /*
       DB::table('election')->insert(
       ['election_name' =>Input::get('election_name'),'start_time' =>Input::get('start_time'),      'end_time'=>Input::get('end_time') ]
       );
*/

       


    //   echo Auth::user()->email;
    }
}
