<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

use App\Machine;
use App\Client;
use App\Rent;
use App\Machinerent;

class MachineController extends Controller
{

    public function __construct(){
        $this->middleware('session');
    }

    public function index(Request $request){
        $search = $request->get('search');

        if(trim($search) != "")
            $machines = Machine::where(DB::raw("CONCAT(model, ' ', brand, ' ', year, ' ', economic)"),"LIKE","%$search%")->orderBy('economic','ASC')->paginate(10);
        else
            $machines = Machine::orderBy('status','ASC')->paginate(10);

        return view('machine.index',['machines' => $machines]);
    }

    public function create(){
        return view('machine.create');
    }

    public function store(Request $request){
        $machine = new Machine();
        $machine->fill($request->all());
        $machine->save();
        return redirect('/machine');
    }

    public function show($id){
        $machine = Machine::find($id);
        $machinerents = Machinerent::all()->where('machine_id', $id);

        $rent = [];
        $client = [];
        $machinerentt = [];
        
        foreach($machinerents as $machinerent){
            $rent = Rent::find($machinerent->rent_id);
            $client = Client::find($rent->client_id);
            $machinerent->client = $client;
        }
        
        return view('machine.show',[
            'machine' => $machine, 
            'client' => $client, 
            'rent' => $rent,
            'machinerents' => $machinerents
        ]);
    }

    public function edit($id){
        $machine = Machine::find($id);
        return view('machine.edit',compact('machine'));
    }
    
    public function update($id, Request $request){
        $machine = Machine::find($id);
        $machine->fill($request->all());
        $machine->save();
        return redirect('/machine');
    }

    public function destroy($id){
        Machine::destroy($id);
        return redirect('/machine');
    }

    public function list(){
        $machines = Machine::All();
        return response()->json(
            $machines->toArray()
        );
    }

    public function search(Request $request){
        $search = $request->get('search');
        $machines = Machine::where(DB::raw("CONCAT(model, ' ', brand, ' ', year, ' ', economic)"),"LIKE","%$search%")->orderBy('economic','ASC')->paginate(10);

        foreach($machines as $machine){
            $machinerent = Machinerent::where('machine_id',$machine->id)->get();
            $machine["machinerent"] = $machinerent;
        }
        
        return response()->json($machines->all());
    }
}