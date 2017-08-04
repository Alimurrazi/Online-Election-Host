<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use View;

class votesubmitController extends Controller
{
    public function votesubmit()
    {
      $voter=DB::table('voter')
             ->where('id','=',Input::get('voter_id'))
             ->first();

      if($voter->vote_status==1)
      return view::make('noentry');
      else
      {
//->update(['postname'=>Input::get('post_name'.$post->id)]);
       DB::table('voter')
       ->where('id','=',Input::get('voter_id'))
       ->update(['vote_status'=>1]);

      $input = Input::all();
     // return $input;
      $selected = $input['selected'];
      
      foreach ($selected as $selected)
      {
      	 DB::table('candidate')
      	    ->where('id','=',$selected)
      	    ->increment('vote_count');
      }

      	 return View::make('congratulation');
      }
    }
    }
