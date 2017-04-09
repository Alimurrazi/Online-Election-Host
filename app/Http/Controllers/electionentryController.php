<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use View;

   
class electionentryController extends Controller
{

    public function result($id)
    {
        $all_post=DB::table('post')
                   ->where('election_id','=',$id)
                   ->get();
         
         $winner=[[]];

        foreach ($all_post as $all_post1)
        {
            $all_candidate=DB::table('candidate')
                           ->where('post_id','=',$all_post1->id)
                           ->get();

            $winner_by_post=DB::table('candidate')
                    ->orderby('vote_count','DESC')
                    ->where('post_id','=',$all_post1->id)
                    ->take($all_post1->total_post)
                    ->get();
            
            $i=1; 
             foreach ($winner_by_post as $winner_by_post1)
             {
                $winner[$all_post1->id][$i]=$winner_by_post1;
                $i++;
             }                                              
        }
        
        return view::make('older')->with('all_post',$all_post)->with('winner_list',$winner);
    }


    public function electionentry($id,$status)
    {
    	$db_date=DB::table('election')
    	         ->where('election.id','=',$id)
    	         ->get();
        
        foreach ($db_date as $db_date) 
        {
        	$start_time=$db_date->start_time;
            $present_election=$db_date->election_name;
        }
         
$time = strtotime($start_time); 
$year= date('Y', $time);
$month= date('m', $time);
$date= date('d', $time);
$hour= date('h', $time);
$minute= date('i', $time);  
$second= date('s', $time);


        if($status ==0)
             return $this->result($id);

    	if($status==1)
    		return view::make('loginpage')->with('id',$id)->with('present_election',$present_election);
        
    	if($status==2)
    		return view::make('future')->with('id',$id)->with('start_time',$start_time)->with('year',$year)->with('month',$month)->with('date',$date)->with('hour',$hour)->with('minute',$minute)->with('second',$second);

    } 
}
