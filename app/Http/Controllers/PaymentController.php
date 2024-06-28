<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::paginate(5);
        return view('payment.index',[
            'payments' => $payments,
            'title' => 'Payment List'
        ]);
    }

    public function create()
    {
        return view('payment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'payment_number' => 'required',
            'amount' => 'required',
        ]);
        $newPayment = Payment::create([
            'order_id' => $request->order_id,
            'payment_number' => $request->payment_number,
            'amount' => $request->amount,
        ]);
        return redirect()->route('payment.index')->with('status', 'Payment created successfully');
    }

    public function show(Payment $payment)
    {
        return view('payment.show', [
            'payment' => $payment,
            'title' => 'Payment Details'
        ]);
    }

}
