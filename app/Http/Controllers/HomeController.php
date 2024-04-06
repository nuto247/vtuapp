<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        $allusers = User::all();

        return view('home', compact('user', 'allusers'));
    }

    public function history()
    {
        $user = Auth::user();

        $allusers = User::all();

        return view('history', compact('user', 'allusers'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('edituser', compact('user'));
       
    }

   


    public function updates(Request $request)
    {
        //$user = User::find($id);
        //$user = Auth::user();
        //$user = User::first();//->simplePaginate(10);
       // $userx = User::where('id', $user->id)->first();

        //$members['members'] = $data;

        $user = User::find($request->id);
        $user->name = request('name');
        $user->email = request('email');
        $user->wallet_address = request('wallet_address');
        $user->pin = request('pin');
        $user->phone = request('phone');
        $user->address = request('address');
        $user->bvn_status = request('bvn_status');
        $user->status = request('status');
     
        $user->save();

        $balance = Wallet::where('holder_id', $request->id)->first();
        $balance->balance = request('balance');
        $balance->save();

    

        return redirect('subscribers');
    }


    public function historyfund()
    {
        $user = Auth::user();

        $allusers = User::all();

        return view('historyfund', compact('user', 'allusers'));
    }

    public function fundmanualedit1(Request $request){

        $user = User::find($request->id);

        $balance = Wallet::where('holder_id', $request->id)->first();
        $balance->balance = request('balance');
        $balance->save();

        return redirect('subscribers');
    }

    public function fundmanualedit($id)
    {
        $user = User::find($id);
        return view('fundmanualedit', compact('user'));
       
    }

    public function fundupdates(Request $request)
    {
        //$user = User::find($id);
        //$user = Auth::user();
        //$user = User::first();//->simplePaginate(10);
       // $userx = User::where('id', $user->id)->first();

        //$members['members'] = $data;

        $user = User::find($request->id);
        $user->name = request('name');
        $user->email = request('email');
        $user->wallet_address = request('wallet_address');
        $user->pin = request('pin');
        $user->phone = request('phone');
        $user->address = request('address');
        $user->bvn_status = request('bvn_status');
        $user->status = request('status');
     
        $user->save();

        $balance = Wallet::where('holder_id', $request->id)->first();
        $balance->balance = request('balance');
        $balance->save();

    

        return redirect('subscribers');
    }


}
