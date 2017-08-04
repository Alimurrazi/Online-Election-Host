<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use View;
 
class MyelectionController extends Controller
{
    public function findelection()
    {
      $user_id=DB::table('users')->where('email',Auth::user()->email)->value('id');

      $election_list=DB::table('userrelation')
                     ->where('user_id','=',$user_id)
                     ->get();

      $my_election=[];
      $i=0;
      foreach ($election_list as $election_list)
      {
              $my_election[$i]=DB::table('election')
                           ->where('id','=',$election_list->election_id)
                           ->get();
                           $i++;  
      }
             
      return view::make('myelectionlist')->with('election_list',$my_election); 
    }


}
