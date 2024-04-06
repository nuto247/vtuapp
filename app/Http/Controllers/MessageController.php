<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Order;

use App\Models\Message;

use App\Models\Deposit;

use App\Models\User;
use App\Models\Wallet;



class MessageController extends Controller
{
    //

    public function readmails()
    {
        $user = Auth::user();
        $orders = Order::all();

        $readmails = Message::all();
       
        $tranx = Deposit::all();

        $tranx1 = Deposit::where('user_id', auth()->id())->get();

        $airtime = Order::where('user_id', auth()->id())->get();

        $totalAmount = Order::sum('amount');

        return view('readmails', compact('user','tranx', 'tranx1','airtime','totalAmount','orders','readmails'));
    }

    public function sendmails()
    {
        $user = Auth::user();
        $orders = Order::all();

        $readmails = Message::all();
       
        $tranx = Deposit::all();

        $tranx1 = Deposit::where('user_id', auth()->id())->get();

        $airtime = Order::where('user_id', auth()->id())->get();

        $totalAmount = Order::sum('amount');

        return view('sendmails', compact('user','tranx', 'tranx1','airtime','totalAmount','orders','readmails'));
    }

    public function store(Request $request)
    {
        $request->validate([
           // 'email' => 'required|email|unique:messages,email'
        ]);
        $user = Auth::user();
        $readmails = Message::all();

        Message::create($request->all());

        //return view('readmails', compact('user','readmails'))->with('success', 'Email submitted successfully!');

        return redirect()->route('readmail');
    }

    public function message($id)
    {
        $user = User::find($id);

        $readmails = Message::find($id);
        return view('readmessage', compact('user', 'readmails'));
       
    }
}
