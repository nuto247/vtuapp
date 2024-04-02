<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Order;
use App\Models\User;
use Exception;
use Triverla\LaravelMonnify\Facades\Monnify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{


    public function transx()
    {
        $user = Auth::user();


        $tranx = Deposit::all();

        $tranx1 = Deposit::where('user_id', auth()->id())->get();

        $airtime = Order::where('user_id', auth()->id())->get();

        return view('transactions', compact('user','tranx', 'tranx1','airtime'));
    }

    public function analysis()
    {
        $user = Auth::user();
        $orders = Order::all();
       
        $tranx = Deposit::all();

        $tranx1 = Deposit::where('user_id', auth()->id())->get();

        $airtime = Order::where('user_id', auth()->id())->get();

        $totalAmount = Order::sum('amount');

        return view('analysis', compact('user','tranx', 'tranx1','airtime','totalAmount','orders'));
    }



        public function manualfunding()
    {
        $user = Auth::user();

        $allusers = User::all();

        return view('manualfunding', compact('user', 'allusers'));
    }

    

    public function showPaymentForm()
    {
        return view('payment');
    }

    public function processWalletFunding(Request $request)
    {

        try {

            DB::beginTransaction();

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
            
            DB::commit();
            
            return  Monnify::payment()->makePaymentRequest($data)->redirectNow();

        } catch (Exception $e) {

            dd($e);

            DB::rollBack();
        }
    }

    /**
     * Get payment information
     * @return void
     */
    public function handlePaymentCallback()
    {
        $paymentDetails = Monnify::payment()->getPaymentData();

        //dd($paymentDetails);

        try {

            DB::beginTransaction();

            if ($paymentDetails->completed == true && $paymentDetails->paymentStatus == 'PAID') {

                $deposit = Deposit::find($paymentDetails->metaData->deposit_id);

                if ($deposit->status == 'pending') {

                    $deposit->status = 'completed';
                    $deposit->transaction_id = $paymentDetails->transactionReference;
                    $deposit->save();

                    $user = User::find($paymentDetails->metaData->user_id);
                    $user->deposit($paymentDetails->amount);
                }
            }

            DB::commit();
        } catch (Exception $e) {

            dd($e);

            DB::rollBack();
        }

        return redirect()->route('home');
    }
}