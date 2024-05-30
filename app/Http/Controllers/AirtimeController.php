<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AirtimeController extends Controller
{

    public function rechargeairtime()
    {
        $user = Auth::user();

        return view('recharge1', compact('user'));
    }
    public function recharge(Request $request)
    {


        // Validate request inputs
        $request->validate([
         
            'phone' => 'required|string',
            'network_id' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        //dd($request->all());

        // Create Guzzle HTTP client
        $client = new Client();

        if ($request->amount > \Auth::user()->balance) {

            session()->flash('alert-message', [
                'type' => 'danger',
                'title' => 'Error',
                'message' => 'Insufficient wallet balance'
            ]);

            return redirect()->back();
        }

        $settings = Setting::all()->first();
        $url = $settings->api;

        // create an order
        $order = new Order();
        $order->user_id = Auth::id();
        $order->network = $request->network_id;
        $order->phone = $request->phone;
        $order->amount = $request->amount;
        $order->status = 'pending';
        $order->order_type = 'airtime';
        $order->save();

        //DB::beginTransaction();

        try {

            

            // Make API request to recharge airtime with parameters in URL query string
            $response = $client->get($url, [
                'query' => [
                    'username' => $settings->username,
                    'password' => $settings->password,
                    'phone' => $request->phone,
                    'network_id' => $request->network_id,
                    'amount' => $request->amount,

                   // dd($settings->username)
                ]
            ]);

            // Decode response body
            $responseData = $response->getBody()->getContents();

            //dd($responseData);

            $data = json_decode($responseData, true);

            //dd($data);

            if ($data['code']  == 'success') {
                $order->status = 'success';
                $order->order_reference = $data['data']['order_id'];
                $order->save();
                $order->user->withdraw($order->amount);
            }

            session()->flash('alert-message', [
                'type' => 'success',
                'title' => 'Successful',
                'message' => 'Your Airtime recharge of ' . $request->amount  . ' was successful'
            ]);

            // Airtime recharge successful
            /* return response()->json([
                'success' => true,
                'message' => 'Airtime recharge successful',
                'data' => json_decode($responseData),
            ], 200); */
        } catch (RequestException $e) {

            $order->status = 'failed';
            $order->save();

            // Handle GuzzleHttp exception
            $responseBody = $e->getResponse()->getBody()->getContents();
            $statusCode = $e->getResponse()->getStatusCode();

            //dd($responseBody);

            $data = json_decode($responseBody, true);

            // Airtime recharge failed
            session()->flash('alert-message', [
                'type' => 'danger',
                'title' => 'Error',
                'message' => $data['message']
            ]);

            /* return response()->json([
                'success' => false,
                'message' => 'Airtime recharge failed',
                'error' => json_decode($responseBody),
            ], $statusCode); */
        }
        return redirect()->back();
    }
}
