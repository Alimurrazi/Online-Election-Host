<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use View;

class FundamentalUpdateController extends Controller
{
    public function show($id)
    {
    	$fundamental_data=DB::table('election')
    	      ->where('id','=',$id)
    	      ->get();

    	 return view::make('FundamentalUpdate')->with('data',$fundamental_data)->with('id',$id);     
    }


    public function update()
    {
       $data=DB::table('election')
             ->where('id','=',Input::get('id'))
             ->get();
        $check=0;     
        foreach ($data as $data)
        {
         	 if($data->start_time!=Input::get('start_time'))
        {
            $check=1;
            DB::table('election')
            ->where('id','=',Input::get('id'))
            ->update(['start_time'=>Input::get('start_time')]);
        }
        if($data->end_time!=Input::get('end_time'))
        {
        	$check=1;
            DB::table('election')
            ->where('id','=',Input::get('id'))
            ->update(['end_time'=>Input::get('end_time')]);
        }     
         
        }
        if($check==1)
    	return view::make('update');
        else
        return redirect()->back();	
    }

    public function delete($id)
    {
         DB::table('election')
             ->where('id','=',$id)
             ->delete();

        DB::table('userrelation')
             ->where('election_id','=',$id)
             ->delete();      

        //  return redirect('/home');
          return redirect('/myelection');        
    }
}
