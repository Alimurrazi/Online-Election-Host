<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class UpdateController extends Controller
{
    public function UpdateElection($id)
    {
        return view::make('MyUpdate')->with('id',$id);
    }
}
