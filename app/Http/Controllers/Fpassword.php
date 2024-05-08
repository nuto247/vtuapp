<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Fpassword extends Controller
{
    //

    public function forgot() {
        return view('fpassword');
    }
}
