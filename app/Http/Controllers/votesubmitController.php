<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use View;

class votesubmitController extends Controller
{
    public function votesubmit()
    {
      echo "hello world";
      $input = Input::all();
      return $input;
    }
}
