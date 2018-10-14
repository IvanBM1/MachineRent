<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main(){
        if(Auth::check())
            return redirect('/rent');
        else
            return view('user.login');
    }
}
