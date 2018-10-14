<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Client;

class EmployeeController extends Controller
{
    public function create($id){
        $client = Client::find($id);
        return view('employee.create',['client' => $client]);
    }

    public function store(Request $request){
        $employee = Employee::create($request->all());
        $employee->save();
        return redirect('/client/'.$employee->client_id);
    }

    public function edit($id){
        $employee = Employee::find($id);
        return view('employee.edit',['employee' => $employee]);
    }

    public function update($id, Request $request){
        $employee = Employee::find($id);
        $employee->fill($request->all());
        $employee->save();
        return redirect('/client/'.$employee->client_id);
    }

    public function destroy($id){
        $employee = Employee::find($id);
        Employee::destroy($id);
        return redirect('/client/'.$employee->client_id);
    }

    public function search(Request $request) {
        $search = $request->get('search');
        $employees = Employee::all()->where('client_id', $search);
        return response()->json($employees->toArray());
    }

}
