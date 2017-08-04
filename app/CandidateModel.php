<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateModel extends Model
{
     public function post()
    {
    	return $this->belongsTo('PostModel'); 
    }
}
