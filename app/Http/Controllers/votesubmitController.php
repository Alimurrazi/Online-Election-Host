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
