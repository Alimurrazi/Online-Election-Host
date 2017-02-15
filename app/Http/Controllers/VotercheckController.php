<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use View;

class VotercheckController extends Controller
{
    public function votercheck($id)
    {
            $voter=DB::table('voter')
            ->where('voter.election_id','=',$id)
            ->where('voter.username','=',Input::get('username'))
            ->where('voter.father_name','=',Input::get('fathername'))
            ->where('voter.mother_name','=',Input::get('mothername'))
            ->where('voter.id_number','=',Input::get('idnumber'))
            ->where('voter.email','=',Input::get('email'))
            ->where('voter.password','=',Input::get('password'))
            ->count();
            
            if($voter==0)
            return View::make('noentry');
            else  	
            echo "$voter";
            
    }
}
