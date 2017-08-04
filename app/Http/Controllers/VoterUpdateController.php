<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use View;
 
class VoterUpdateController extends Controller
{
    public function show($id)
    {
    	$data=DB::table('voter')
    	      ->where('election_id','=',$id)
    	      ->get(); 
    	return view::make('VoterUpdate')->with('voter_data',$data)->with('id',$id);     
    }

    public function update()
    {
        $voter_data=DB::table('voter')
                    ->where('election_id','=',Input::get('election_id'))
                    ->get();
         $check=0;           
        foreach ($voter_data as $voter)
        {
           if($voter->username!=Input::get('name'.$voter->id))
            {
            	$check=1;
              DB::table('voter')
               ->where('id','=',$voter->id)
               ->update(['username'=>Input::get('name'.$voter->id)]);
            }
             if($voter->id_number!=Input::get('id_number'.$voter->id))
            {
            	$check=1;
              DB::table('voter')
               ->where('id','=',$voter->id)
               ->update(['id_number'=>Input::get('id_number'.$voter->id)]);
            }
             if($voter->email!=Input::get('email'.$voter->id))
            {
            	$check=1;
              DB::table('voter')
               ->where('id','=',$voter->id)
               ->update(['email'=>Input::get('email'.$post->id)]);
            }                 
        }
        if($check==1)
        {
        	return view::make('update');
        }
        else
        {
             return redirect()->back();
        }                
    }

    public function delete($id)
    {
    	   DB::table('voter')
          ->where('id','=',$id)
          ->delete();

        return redirect('/myelection');
    }
}
