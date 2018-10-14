<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function __construct(){
        // $this->middleware('session');
    }

    public function index(){
        return view('user.login');
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->type = $request->get('type');
        $user->save();

        return redirect('/');
    }


}
