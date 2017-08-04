<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use View; 

class electioncreateController extends Controller
{
     public function electioncreate()
     {
       /*
       $id=DB::table('users')->where('name','=',Auth::user()->name)
                            ->where('email','=',Auth::user()->email)
                            ->value('id');
        */
        
       $new_election_id=DB::table('election')
                        ->max('id');
                      //  ->count();
       $new_election_id++;

       return view::make('electiondata')->with('id',$new_election_id);  
     }
}
