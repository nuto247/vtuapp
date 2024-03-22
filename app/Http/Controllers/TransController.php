<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransController extends Controller
{
    //
    public function maketrans()
    {
        $user = Auth::user();

        return view('recharge-data1', compact('user'));
    }
}
