<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use View;

class PostUpdateController extends Controller
{
    public function show($id)
    {
        $post=DB::table('post')
              ->where('election_id','=',$id)
              ->get();

    	return view::make('PostUpdate')->with('data',$post)->with('id',$id); 
    }

    public function update()
    {
        $post=DB::table('post')
              ->where('election_id','=',Input::get('election_id'))
              ->get();

        $check=0;      

        foreach ($post as $post)
        {
        	$data=DB::table('post')
        	      ->where('id','=',$post->id)
        	      ->first();
                            
            if($post->postname!=Input::get('post_name'.$post->id))
            {
            	$check=1;
              DB::table('post')
               ->where('id','=',$post->id)
               ->update(['postname'=>Input::get('post_name'.$post->id)]);
            }
             if($post->total_post!=Input::get('total_post'.$post->id))
            {
            	$check=1;
              DB::table('post')
               ->where('id','=',$post->id)
               ->update(['total_post'=>Input::get('total_post'.$post->id)]);
            }
             if($post->total_candidate!=Input::get('total_candidate'.$post->id))
            {
            	$check=1;
              DB::table('post')
               ->where('id','=',$post->id)
               ->update(['total_candidate'=>Input::get('total_candidate'.$post->id)]);
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
       DB::table('post')
          ->where('id','=',$id)
          ->delete();

        return redirect('/myelection');
    }
}
