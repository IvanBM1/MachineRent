<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Payment;
use App\Rent;

class PaymentController extends Controller
{
    public function store(Request $request){
        $payment = new Payment();
        $payment->fill($request->all());
        $payment->save();

        $rent = Rent::find($payment->rent_id);
        $rent->payment = intval($rent->payment) + intval($payment->entry);
        $rent->save();

        return redirect('/rent/'.$payment->rent_id);
    }
}
