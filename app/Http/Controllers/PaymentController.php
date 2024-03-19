<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Triverla\LaravelMonnify\Facades\Monnify;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    /**
     * Redirect the Customer to Monnify Payment Page
     * @return Url
     */
    public function redirectToMonnifyGateway()
    {
        try{
            return Monnify::payment()->makePaymentRequest()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['message'=>'The Monnify token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Get payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Monnify::payment()->getPaymentData();

        return redirect()->route('success');
        

       // dd($paymentDetails);
        // Now you have the payment details,
        // you can then redirect or do whatever you want
    }

    public function showPaymentForm()
    {
        //$user = Auth::user();

        return view('payment');
    }

    public function success()
    {
        $user = Auth::user();

        return view('success', compact('user'));
    }

    public function saveData(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'amount' => 'required',
            'customerName' => 'required',
            // Add more validation rules as needed
        ]);

        // Store data in the database
        YourModel::create($validatedData);

        return response()->json(['success' => true]);
    }
}