<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use DB;
use Mail;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string 
     */
    protected $description = 'send email to registered voter';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
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

             $Voter_list=DB::table('voter')
                         ->where('election_id','=',$email_election->id)
                         ->get();

            foreach ($Voter_list as $voter_list)
            {
                 $username=$voter_list->username;
                 $email_address=$voter_list->email;
                 $password= Hash::make(str_random(8));
                    
                    echo $voter_list->id;
                     $update=DB::table('voter')
                    ->where('id','=',$voter_list->id)
                    ->update(['password' => $password]);     
                
                echo "2";
               //passwod db te add korte hobe  

                    Mail::send('emails.send', ['username' => $username, 'password' => $password], function ($message) use($email_address)
        {

            $message->from('alimurrazi570@gmail.com', 'Online Election Host');
             
             echo "3";
            $message->to( $email_address);
            echo "4";

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
