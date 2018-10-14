<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SessionRequest;

use Auth;
use Session;

class SessionController extends Controller
{
    
    public function login(SessionRequest $request){
        
        if(Auth::attempt(['name' =>  $request->get('name'),'password' => $request->get('password')]))
            return redirect('/rent');
        
        Session::flash('error', 'Los datos son incorrectos');
        return redirect('/');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    
}