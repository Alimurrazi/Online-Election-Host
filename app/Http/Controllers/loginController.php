<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;

class loginController extends Controller
{
    public function login_form()
    {
    	return view::make('loginpage');
    }
}
