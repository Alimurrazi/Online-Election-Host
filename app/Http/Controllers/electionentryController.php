<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use View;

   
class electionentryController extends Controller
{
    public function test()
    {
        echo "bangladesh";
        $data = Input::all(); 
        $username=Input::get('username');
        echo "$username";
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

        $test=2018;

    	if($status==1)
    		return view::make('loginpage')->with('id',$id)->with('present_election',$present_election);
        
    	if($status==2)
    		return view::make('future')->with('id',$id)->with('start_time',$start_time)->with('year',$year)->with('month',$month)->with('date',$date)->with('hour',$hour)->with('minute',$minute)->with('second',$second);
    } 
}
