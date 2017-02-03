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
        $sample_date =date('Y-m-d H:i:s  ',time());

        $electionlist=DB::table('election')
              ->get();
         

        $electionlist_status=[];

        foreach ($electionlist as $c_electionlist) 
        {

           $db_date=$c_electionlist->start_time;
           $db_id=$c_electionlist->id;

           if($db_date<$sample_date)
           $c_electionlist_status[$db_id]=0;

           else if($db_date>$sample_date)
           $c_electionlist_status[$db_id]=2;

           if($db_date==$sample_date)
           $c_electionlist_status[$db_id]=1;
        }

    //    $date =date('Y/m/d H:i:s',time());
     //   echo ($date);

      /*	$tarikh=date('Y-m-d H:i:s', strtotime($date)); */
      return View::make('electionlist')->with('electionlist',$electionlist)->with('electionlist_status',$electionlist_status);
    }
}
