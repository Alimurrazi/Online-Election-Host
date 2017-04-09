<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use View;  
 
class VotercheckController extends Controller
{

   public function datafromdb($id)
   {

    echo "hello";
    

   }

    public function votercheck($id)
    {
            $voter=DB::table('voter')
            ->where('voter.election_id','=',$id)
            ->where('voter.username','=',Input::get('username'))
            ->where('voter.father_name','=',Input::get('fathername'))
            ->where('voter.mother_name','=',Input::get('mothername'))
            ->where('voter.id_number','=',Input::get('idnumber'))
            ->where('voter.email','=',Input::get('email'))
            ->where('voter.password','=',Input::get('password'))
            ->count();
             
            if($voter==0) 
            return View::make('noentry');
            else
            {
             
              $Post=DB::table('post')
             ->where('election_id','=',$id)
             ->get();
       
       $Candidate= [];

        $data=DB::table('post')
              ->where('post.election_id','=',$id)
             ->join('candidate','post.id','=','candidate.post_id')
              ->get();

        $post_count=DB::table('post')
                    ->where('post.election_id','=',$id)
                    ->count();
   
      /*-----------------------------------------------------------------------*/  
       $all_post=DB::table('post')
                ->where('post.election_id','=',$id)
                ->get();

      $all_candidate=[[]];          
       
       foreach ($all_post as $all_post1) {
          $candidate_by_post=DB::table('candidate')
                            ->where('candidate.post_id','=',$all_post1->id)
                            ->get();
          foreach ($candidate_by_post as $candidate_by_post)
          {
          $all_candidate[$all_post1->id][$candidate_by_post->id]=$candidate_by_post;
          }                  
       }

      /*-----------------------------------------------------------------------*/

       return view::make('running')->with('data',$data)->with('post_count',$post_count)->with('post_list',$all_post)->with('candidate_list',$all_candidate);

            }
            
    }
}
