<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Hash;
use DB;

class EmailController extends Controller
{
     public function send(Request $request)
    {
        $email_election=DB::table('election')
                        ->where('email_send','=',0)
                        ->get();

        foreach($email_election as $email_election)
        {
           if($email_election->start_time) 
           $election_time=strtotime($email_election->start_time);
           $today_time=strtotime('now');
           $differ=$election_time-$today_time;
           if($differ<=86400 && $differ>=0)  //send email one day before starting election
           {
             echo "welcome";

             $voter_list=DB::table('voter')
                         ->where('election_id','=',$email_election->id)
                         ->get();

            foreach ($voter_list as $voter_list)
            {
                 $username=$voter_list->username;
                 $password= Hash::make(str_random(8));
                 
               //passwod db te add korte hobe  

        Mail::send('emails.send', ['username' => $username, 'password' => $password], function ($message)
        {

            $message->from('alimurrazi570@gmail.com', 'Online Election Host');

            $message->to( $voter_list->email);

        });

            }

            $update=DB::table('election')
                    ->where('id','=',$email_election->id)
                    ->update(array('email_send' => 1));

             
           }
        }                
         
         return 0;

        $title = $request->input('title');
        $content = $request->input('content');

        $title = "Rana";
        $content = Hash::make(str_random(8));

        Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
        {

            $message->from('alimurrazi570@gmail.com', 'Online Election Host');

            $message->to('ranasust42@gmail.com');

        });

        return response()->json(['message' => 'Request completed']);
    }
}
