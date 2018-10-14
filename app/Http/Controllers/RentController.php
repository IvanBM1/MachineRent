<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Rent;
use App\Payment;
use App\Machine;
use App\Machinerent;

use App\Client;
use App\Employee;
use App\Address;

class RentController extends Controller
{
    
    public function __construct(){
        $this->middleware('session');
    }

    public function index(Request $request){
        
        $rents = Rent::orderBy('created_at','DESC')->paginate(10);

        foreach($rents as $rent)
            $rent->client = Client::find($rent->client_id);

        return view('rent.index', compact('rents'));
    }

    public function create(){
        return view('rent.create');
    }

    public function show($id){

        $rent = Rent::find($id);        
        $client = Client::find($rent->client_id);
        $employee = Employee::find($rent->employee_id);
        $address = Address::find($rent->address_id);

        $payments = Payment::all()->where('rent_id', $id);

        $machinerents = Machinerent::all()->where('rent_id', $id);
        foreach($machinerents as $machinerent)
            $machinerent->machine = Machine::find($machinerent->machine_id);

        return view('rent.show',[
            'rent' => $rent, 
            'client' => $client,
            'employee' => $employee,
            'address' => $address,
            'machinerents' => $machinerents,
            'payments' => $payments
        ]);
    }

    public function store(Request $request){

        $rent = new Rent();
        $rent->fill($request->all());
        $rent->save();

        $payment = new Payment();
        $payment->rent_id = $rent->id;
        $payment->entry = $rent->payment;
        $payment->save();

        $machines = preg_split("/[*]/", $request->get('machines_ids'));
        foreach ($machines as $machine){
            if($machine != ""){
                $datamachine = preg_split("/[&]/", $machine);
                
                $machine_id = $datamachine[0];
                $dateinit   = $datamachine[1];
                $dateend    = $datamachine[2];
                $rentcost   = $datamachine[3];
                $extradays  = $datamachine[4];
                $description = $datamachine[5];

                $machinerent = new Machinerent();
                $machinerent->rent_id = $rent->id;
                $machinerent->machine_id = $machine_id;
                $machinerent->dateinit = $dateinit;
                $machinerent->dateend = $dateend;
                $machinerent->rentcost = $rentcost;
                $machinerent->extradays = $extradays;
                $machinerent->description = $description;
                $machinerent->concret = false;
                
                $machinerent->save();

                $changeMachine = Machine::find($machinerent->machine_id);
                $changeMachine->status = 2;
                $changeMachine->save();
            }
        }

        return redirect('/rent');
    }

}
