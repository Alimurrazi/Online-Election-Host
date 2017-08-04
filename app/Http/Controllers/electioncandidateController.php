<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use View;
use Session;
use Cookie;
use File;

class electioncandidateController extends Controller
{
    public function datasubmit()
    {
     
    Session::put('anti_refresh','0');  //do not add data in database due to refreash

    Session::put('Input2',Input::get());
   
    $data1=Session::get('Input1');

    $total_post=$data1['total_post'];
    
    $delete = File::deleteDirectory(public_path().'/'.'temporary'.'/');
    $result = File::makeDirectory(public_path().'/'.'temporary'.'/'); 
    
   // return Input::all();

    for($i=0;$i<$total_post;$i++)  
    {
      $total_candidate=$data1[$i.'total_candidate'];

      for($j=0;$j<$total_candidate;$j++)
      {
      	$candidate_name=Input::get($i.'_'.$j.'_candidate_name');
        
        $image = Input::file($i.'_'.$j.'_image');
		$original_name = $image->getClientOriginalName();
		$image_extension= $image->getClientOriginalExtension();
        $image->move(public_path().'/'.'temporary'.'/'.$i.'/'.$j.'/',$candidate_name.'.'.$image_extension);

		$video = Input::file($i.'_'.$j.'_video');
		$original_name = $video->getClientOriginalName();
		$video_extension= $video->getClientOriginalExtension();
	//	$video->move(public_path().'/'.'temporary'.'/'.$i.'/'.$j.'/',$original_name);
		$video->move(public_path().'/'.'temporary'.'/'.$i.'/'.$j.'/',$candidate_name.'.'.$video_extension);
      }
    }
    
    return view::make('voterdata');
    
    }
}

