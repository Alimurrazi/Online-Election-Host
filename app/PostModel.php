<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table='post';

    public function election()
    {
    	return $this->belongsTo('ElectionModel');
    }

    public function candidate()
    {
    	return $this->hasMany('CandidateModel','post_id');
    }
}
