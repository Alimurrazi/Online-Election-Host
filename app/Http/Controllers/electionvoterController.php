<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use Auth;
use Cookie;
use File;
use View;

class electionvoterController extends Controller
{
    public function datasubmit()
    {
    	//return Input::get();

  echo "hello1";
    	$anti_refresh=Session::get('anti_refresh');
    //	echo $anti_refresh;

   //  if($anti_refresh==0)
    	{
    		$anti_refresh=1;
    		Session::forget('anti_refresh');
    		Session::put('anti_refresh','1');

/*-------------------- use of 1st part of form(election data) ------------------------------------*/
      $data1=Session::get('Input1');
 
      DB::table('election')->insert(['id' =>$data1['election_id'], 'election_name' =>$data1['election_name'],'start_time' =>$data1['start_time'],'end_time' =>$data1['end_time']]);

      $user_id=DB::table('users')->where('email',Auth::user()->email)->value('id');
 
      DB::table('userrelation')->insert(['election_id' =>$data1['election_id'],'user_id'=>$user_id]);

      $total_post=$data1['total_post'];  

      for($i=0;$i<$total_post;$i++)
      {

       DB::table('post')->insert( ['postname' =>$data1[$i.'post_name'],'total_post' =>$data1[$i.'individual_seat'],'total_candidate' =>$data1[$i.'total_candidate'],'election_id' => $data1['election_id'] ]);
      }

/*---------------------------------------------------------------*/
     }

     echo "hello2";

      $data2=Session::get('Input2');
      
      $all_post=DB::table('post')
                ->where('election_id','=',$data1['election_id'])
                ->get();

    //  $result= File::makeDirectory(public_path().'/'.'img'.'/'.$data1['election_id'].'/');          
      $i=0;
      foreach ($all_post as $all_post)
      {
         for($j=0;$j<$all_post->total_candidate;)
         {
            
          $candidate_name=$data2[$i.'_'.$j.'_candidate_name'];
          $team_name=$data2[$i.'_'.$j.'_team_name'];

    //       echo "hello3";

            $oldpath=public_path().'/'.'temporary'.'/'.$i.'/'.$j.'/';
            $j=$j+1;
            $newpath=public_path().'/'.'img'.'/'.$data1['election_id'].'/'.$all_post->id.'/'.$j.'/';
         // return $newpath;
            $result=File::makeDirectory($newpath,0777,true);
            $success =File::copyDirectory($oldpath, $newpath);
         //   $result=File::move($oldpath,$newpath);
         }
         $i++;
         
         $count=0;
         $file = File::allFiles($newpath);
         foreach ($file as $file) {
         	if($count==0)
         	{	
         	$image_ext=$file->getExtension();
         	$image_name=$file->getFileName();
            }
            else
            {
            $video_ext=$file->getExtension();
            $video_name=$file->getFileName();
            }	
         	$count=1;
         }
       //  echo $image;
       //  echo $video;
        
        if($image_ext=='jpg' || $image_ext=='jpeg' || $image_ext=='png' || $image_ext=='gif')
        {
           
        }
        else
        {
            $temp=$image_ext;
            $image_ext=$video_ext;
            $video_ext=$temp;

            $temp=$image_name;
            $image_name=$video_name;
            $video_name=$temp;
        }
        $image_drk='img'.'/'.$data1['election_id'].'/'.$all_post->id.'/'.$j.'/'.$image_name;
        $video_drk='img'.'/'.$data1['election_id'].'/'.$all_post->id.'/'.$j.'/'.$video_name;

        
        DB::table('candidate')->insert( ['name' =>$candidate_name,'team' =>$team_name,'image' =>$image_drk,'video' => $video_drk,'post_id' => $all_post->id] );

      }
    
     $total_voter=Input::get('total_voter');

     for($i=0;$i<$total_voter;$i++)

     DB::table('voter')->insert(['username' => Input::get($i.'voter_name'),
                                 'id_number'=> Input::get($i.'voter_id'),
                                 'email'    => Input::get($i.'voter_email'),
                                 'election_id'=> $data1['election_id']
                                ]);
     return view::make('hostfinish');                             
    }
}