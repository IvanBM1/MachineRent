<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Machinerent;
use App\Machine;
use App\Rent;

class MachinerentController extends Controller
{

    public function edit($id){
        $machinerent = Machinerent::find($id);
        $machinerent->machine = Machine::find($machinerent->machine_id);

        return view('machinerent.edit',['machinerent' => $machinerent]);
    }

    public function update($id, Request $request){
        $machinerent = Machinerent::find($id);

        $rent = Rent::find($machinerent->rent_id);
        $lastval = $rent->total - $machinerent->rentcost;
        
        $machinerent->fill($request->all());

        $rent->total = $machinerent->rentcost + $lastval;


        $rent->save();
        $machinerent->save();

        return redirect('/rent/'.$machinerent->rent_id);
    }

    public function search(Request $request){
        $search = $request->get('search');
        $machines = Machine::find($search);
        return response()->json($machines->all());
    }
}
