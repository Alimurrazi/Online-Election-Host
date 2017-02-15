<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoterModel extends Model
{
    protected $table='voter';

    public function election()
    {
    	return $this->belongsTo('ElectionModel');
    }
}
