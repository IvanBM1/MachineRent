<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\Client;

class AddressController extends Controller
{
    public function __construct(){
        $this->middleware('session');
    }

    public function create($id){
        $client = Client::find($id);
        return view('address.create',['client' => $client]);
    }

    public function store(Request $request){
        $address = Address::create($request->all());
        $address->save();
        return redirect('/client/'.$address->client_id);
    }

    public function edit($id){
        $address = Address::find($id);
        return view('address.edit',['address' => $address]);
    }

    public function update($id, Request $request){
        $address = Address::find($id);
        $address->fill($request->all());
        $address->save();
        return redirect('/client/'.$address->client_id."/edit");
    }

    public function search(Request $request) {
        $search = $request->get('search');
        $addresses = Address::all()->where('client_id', $search);
        return response()->json($addresses->toArray());
    }
}
