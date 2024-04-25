<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Triverla\LaravelMonnify\Facades\Monnify;

class BVNVerificationController extends Controller
{
    public function verify(Request $request)
    {

        // Validate the incoming request
        $request->validate([
            'bvn' => 'required|numeric|digits:11',
            'account_name' => 'required|string',
            'phone' => 'required|numeric',
            'dob' => 'required|string|date_format:d-m-Y',
        ]);

        // Retrieve the BVN from the request
        $bvn = $request->bvn;
        $account_name = $request->account_name;
        $phone = $request->phone;
        $dob = $request->dob;

        // Call the verifyBVN method to perform the verification
        try {

            $response = Monnify::verify()->bvn($bvn, $account_name, $dob, $phone);

            dd($response);

        } catch (Exception $e) {

            dd($e);

        }

        // Return the verification data
        //return response()->json($verificationData);
    }


}
