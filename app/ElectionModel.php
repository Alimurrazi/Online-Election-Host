<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElectionModel extends Model
{
    protected $table ='election'; 

    public function voter() 
    {
    	return $this->hasMany('VoterModel','election_id'); 
    }

    public function post()
    {
    	return $this->hasMany('PostModel','election_id');
    }
}
