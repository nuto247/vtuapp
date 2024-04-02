<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $user->status = request('status');
        $user->save();

        return redirect('subscribers');
    }


}
