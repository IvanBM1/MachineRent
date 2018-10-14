<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Phone;
use App\Client;

class PhoneController extends Controller
{
    public function store(Request $request){
        $phone = new Phone();
        $phone->fill($request->all());
        $phone->save();
        return redirect('/client/'.$phone->client_id);
    }

    public function edit($id){
        $phone = Phone::find($id);
        $client = Client::find($phone->client_id);
        return view('phone.edit',['phone' => $phone,'client' => $client]);
    }

    public function update($id, Request $request){
        $phone = Phone::find($id);
        $phone->fill($request->all());
        $phone->save();
        return redirect('/client/'.$phone->client_id);
    }

    public function destroy($id){
        $phone = Phone::find($id);
        Phone::destroy($id);
        return redirect('/client/'.$phone->client_id);
    }
}
