<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class TransactionControlller extends Controller
{
    //

    public function maketrans()
    {
        $user = Auth::user();

        return view('recharge-data1', compact('user'));
    }
}
