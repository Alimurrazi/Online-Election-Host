<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
      
class electionlistController extends Controller
{
    public function electionlist()
    {
    	/*
    	echo "Hello world ";
     	date_default_timezone_set("Asia/Dhaka");
    	echo "The time is " .date("y-m-d ") .date("h:i:sa");

    	$date= new \DateTime();
    	echo date_format($date,' Y-m-d H:i:s');

        $timezone=date_default_timezone_get();
        echo "The current server timezone is: " .$timezone;
*/      
        date_default_timezone_set("Asia/Dhaka");
        $sample_date =date('Y-m-d H:i:s  ',time());

        $electionlist=DB::table('election')
              ->get();
         

        $electionlist_status=[];

        foreach ($electionlist as $c_electionlist) 
        {

           $db_date_start=$c_electionlist->start_time;
           $db_date_end=$c_electionlist->end_time;
           $db_id=$c_electionlist->id;

           if($db_date_end<$sample_date)
           $electionlist_status[$db_id]=0;
 
           else if($db_date_start>$sample_date)
           $electionlist_status[$db_id]=2; 

           if($db_date_start<=$sample_date && $db_date_end>=$sample_date)
           $electionlist_status[$db_id]=1;
        } 
 
    //    $date =date('Y/m/d H:i:s',time());
     //   echo ($date);

      /*	$tarikh=date('Y-m-d H:i:s', strtotime($date)); */
      return View::make('electionlist')->with('electionlist',$electionlist)->with('electionlist_status',$electionlist_status);
    }
}
