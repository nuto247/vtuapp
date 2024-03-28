<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class DataRechargeController extends Controller
{

    public function rechargeData1()
    {
        $user = Auth::user();

        return view('recharge-data1', compact('user'));
    }

    public function rechargeData(Request $request)
    {

        // Validate request data
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'phone' => 'required|string',
            'network_id' => 'required|string',
            'variation_id' => 'required|string',

        ]);

        //dd($request->all());

        $client = new Client();

        if ($request->amount > \Auth::user()->balance) {

            session()->flash('alert-message', [
                'type' => 'danger',
                'title' => 'Error',
                'message' => 'Insufficient wallet balance'
            ]);

            return redirect()->back();
        }

        // create an order
        $order = new Order();
        $order->user_id = Auth::id();
        $order->network = $request->network_id;
        $order->variation_id = $request->variation_id;
        $order->status = 'pending';
        $order->order_type = 'data';
        $order->save();

        // Prepare query parameters
        $queryParams = [
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
            'phone' => $validatedData['phone'],
            'network_id' => $validatedData['network_id'],
            'variation_id' => $validatedData['variation_id'],
        ];

        // Build URL with query parameters
        $url = 'https://vtu.ng/wp-json/api/v1/data?' . http_build_query($queryParams);

        // Make API call to recharge data
        $client = new Client();

        try {

            $response = $client->get($url);

            $data = json_decode($response->getBody(), true);

            // Check if recharge was successful
            if ($data['code'] == 'success') {
                $amount = preg_replace('/[^0-9]/', '', $data['data']['amount']);
                $order->status = 'success';
                $order->order_reference = $data['data']['order_id'];
                $order->data_plan = $data['data']['data_plan'];
                $order->phone = $data['data']['phone'];
                $order->amount = $amount;
                $order->save();
                $order->user->withdraw($order->amount);

                session()->flash('alert-message', [
                    'type' => 'success',
                    'title' => 'Successful',
                    'message' => 'Your Data recharge of ' . $data['data']['data_plan']  . ' was successful'
                ]);

            } else {

                session()->flash('alert-message', [
                    'type' => 'danger',
                    'title' => 'Error',
                    'message' => 'Data recharge failed'
                ]);
                
            }
        } catch (\Exception $e) {
            session()->flash('alert-message', [
                'type' => 'danger',
                'title' => 'Error',
                'message' => $e->getMessage()
            ]);
            //return response()->json(['message' => $e->getMessage()], 500);
        }

        return redirect()->back();
    }
}