<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Address;
use App\Phone;
use App\Employee;
use DB;

class ClientController extends Controller
{

    public function __construct(){
        $this->middleware('session');
    }
    
    public function index(Request $request) {

        $search = $request->get('search');
        if(trim($search) != "")
            $clients = Client::where(DB::raw("CONCAT(name, ' ', email, ' ', phone)"),"LIKE","%$search%")->paginate(3);
        else
            $clients = Client::paginate(3);

        return view('client.index',compact('clients'));
    }

    public function create(){
        return view('client.create');
    }

    public function show($id){
        $client = Client::find($id);
        $addresses = Address::All()->where('client_id', $id);
        $phones = Phone::All()->where('client_id', $id);
        $employees = Employee::All()->where('client_id',$id);

        return view('client.show',[
            'client' => $client,
            'addresses' => $addresses, 
            'phones' => $phones,
            'employees' => $employees
        ]);
    }

    public function store(Request $request) {
        $client = new Client();
        $client->name = $request->get('name');
        $client->phone = $request->get('phone');
        $client->email = $request->get('email');
        $client->save();

        return redirect('/client/'.$client->id);
    }

    public function edit($id){
        $client = Client::find($id);
        return view('client.edit',['client' => $client]);
    }

    public function update($id, Request $request){
        $client = Client::find($id);
        $client->fill($request->all());
        $client->save();
        return redirect('/client');
    }

    public function destroy($id){
        Client::destroy($id);
        return redirect('/client');
    }


    public function search(Request $request) {
        $search = $request->get('search');
        $clients = Client::where(DB::raw("CONCAT(name, ' ', email, ' ', phone)"),"LIKE","%$search%")->paginate(10);
        return response()->json($clients->all());
    }
}   
