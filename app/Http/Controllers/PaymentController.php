<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;
use Exception;
use Triverla\LaravelMonnify\Facades\Monnify;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{


    public function transx()
    {
        $user = Auth::user();


        $tranx = User::all();

        return view('transactions', compact('user'));
    }

    public function showPaymentForm()
    {
        return view('payment');
    }

    public function processWalletFunding(Request $request)
    {
        $reference = rand(1000000000, 9999999999);

        $deposit = new Deposit();
        $deposit->user_id = Auth::user()->id;
        $deposit->status = 'pending';
        $deposit->amount = (int) request('amount');
        $deposit->reference = $reference;
        $deposit->save();

        $data = array(
            "amount" => request('amount'),
            "customerName" => Auth::user()->name,
            "customerEmail" => Auth::user()->email,
            "paymentReference" => $reference,
            "paymentDescription" => 'payment to fund wallet',
            "currencyCode" => "NGN",
            "redirectUrl" => route('handlePaymentCallback'),
            "paymentMethods" => ['CARD', 'ACCOUNT_TRANSFER'],
            'metaData' => [
                'user_id' => Auth::user()->id,
                'deposit_id' => $deposit->id
            ]
        );

        try {
            return  Monnify::payment()->makePaymentRequest($data)->redirectNow();
        } catch (Exception $e) {
            //dd($e);
        }
    }

    /**
     * Get payment information
     * @return void
     */
    public function handlePaymentCallback()
    {
        $paymentDetails = Monnify::payment()->getPaymentData();

        dd($paymentDetails);

        if ($paymentDetails->completed == true && $paymentDetails->paymentStatus == 'PAID') {

            $user = User::find($paymentDetails->metaData->user_id);
            $user->deposit($paymentDetails->amount);

            return redirect()->route('home');
        }
    }
}
