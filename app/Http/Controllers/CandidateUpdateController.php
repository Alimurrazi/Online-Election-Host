<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use View;
use Session;
use File; 

class CandidateUpdateController extends Controller
{
   public function show($id)
   {
     $post_data=DB::table('post')
                ->where('election_id','=',$id)
                ->get();

     $candidate_data=[];           
    foreach ($post_data as $post)
    {
      $candidate_data[]=DB::table('candidate')
                        ->where('post_id','=',$post->id)
                        ->get();         
    }

     Session::put('candidate_session',$candidate_data);
     Session::put('election_id',$id);


 return view::make('CandidateUpdate')->with('candidate',$candidate_data)->with('post',$post_data)->with('id',$id);           
   }

   public function update()
   {
      $initial_data=Session::get('candidate_session');
      $election_id=Session::get('election_id');
      $check=0;
      $i=0;
      foreach ($initial_data as $init_data)
      {
      	$i++;
      	 $db_data=DB::table('candidate')
      	          ->where('id','=',$init_data[0]->id)
      	          ->first();
          
          $candidate_name=Input::get('candidate_name'.$init_data[0]->id);
      	  if($db_data->name!=Input::get('candidate_name'.$init_data[0]->id))
      	  {
            $check=1;
            DB::table('candidate')
                 ->where('id','=',$init_data[0]->id)
                 ->update(['name'=>Input::get('candidate_name'.$init_data[0]->id)]);
      	  }
      	  if($db_data->name!=Input::get('team'.$init_data[0]->id))
      	  {
      	  	$check=1;
      	  	DB::table('candidate')
                 ->where('id','=',$init_data[0]->id)
                 ->update(['team'=>Input::get('team'.$init_data[0]->id)]);
      	  }
    /*    
       $path= public_path().'/'.'img'.'/'.$election_id.'/'.$init_data[0]->post_id.'/'.$i.'/';
     //  return $path;
     $delete = File::deleteDirectory(public_path().'/'.'img'.'/'.$election_id.'/'.$init_data[0]->post_id.'/'.$i.'/');

      	$image = Input::file('image'.$init_data[0]->id);
//		$original_name = $image->getClientOriginalName();
		$image_extension= $image->getClientOriginalExtension();
      $image->move(public_path().'/'.'img'.'/'.$election_id.'/'.$init_data[0]->post_id.'/'.$i.'/',$candidate_name.'.'.$image_extension);
         
       $video = Input::file('video'.$init_data[0]->id);
		$video_extension= $video->getClientOriginalExtension();
      $video->move(public_path().'/'.'img'.'/'.$election_id.'/'.$init_data[0]->post_id.'/'.$i.'/',$candidate_name.'.'.$video_extension);

*/
          if($check==1)
          return view::make('update');
          else
          return redirect()->back();	

  
      }
   }
   public function delete($id)
   {

   	 DB::table('candidate')
   	    ->where('id','=',$id)
   	    ->delete(); 

   	 return redirect('/myelection');
   }
}
