<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Models\Tvprice;
use App\Models\Order;
use App\Models\Setting;
use Exception;
use GuzzleHttp\Exception\ClientException;

class TVRechargeController extends Controller
{


    public function index()
    {
        // Return view for the form
        return view('tvrecharge');
    }

    public function getVariations(Request $request)
    {
        // Fetch variations based on the selected service_id
        $variations = Tvprice::where('service_id', $request->service_id)->get();

        // Return variations as JSON response
        return response()->json($variations);
    }





    public function rechargetv()
    {
        $user = Auth::user();

        $tvs = Tvprice::all();

        return view('tv_recharge1', compact('user', 'tvs'));
    }


    public function rechargetvsnow(Request $request)
    {
        // Validate required request inputs
        $request->validate([
            'phone' => 'required|string',
            'smartcard_number' => 'required|string',
            'variation_id' => 'required|string',
            'service_id' => 'required|string',
        ]);

        // dd($request->all());

        //fetch price for the subscription
        $subscription = Tvprice::where('service_id', $request->service_id)
            ->where('variation_id', $request->variation_id)
            ->first();

        // check if the price is available
        if (is_null($subscription)) {

            session()->flash('alert-message', [
                'type' => 'error',
                'title' => 'Error',
                'message' => 'Selected plan price not found'
            ]);

            return redirect()->back();
        }

        // Create Guzzle HTTP client
        $client = new Client();

        // Get API settings
        $settings = Setting::all()->first();

        // Create order
        $order = new Order();
        $order->user_id = Auth::id();
        $order->service_id = $request->service_id;
        $order->variation_id = $request->variation_id;
        $order->smartcard_number = $request->smartcard_number;
        $order->amount = $subscription->price;
        $order->status = 'pending';
        $order->order_type = 'tv_recharge';
        $order->save();

        /* dd([
            'username' => $settings->username,
            'password' => $settings->password,
            'phone' => $request->phone,
            'service_id' => $request->service_id,
            'smartcard_number' =>  $request->smartcard_number,
            'variation_id' => $request->variation_id
        ]); */

        try {

            // Make API request to recharge TV with parameters in URL query string
            $response = $client->get('https://vtu.ng/wp-json/api/v1/tv', [
                'query' => [
                    'username' => $settings->username,
                    'password' => $settings->password,
                    'phone' => $request->phone,
                    'service_id' => $request->service_id,
                    'smartcard_number' =>  $request->smartcard_number,
                    'variation_id' => $request->variation_id
                ]
            ]);

            // Decode response body
            $responseData = $response->getBody()->getContents();
            $data = json_decode($responseData, true);

            if ($data['code'] == 'success') {
                $order->status = 'success';
                $order->order_reference = $data['data']['order_id'];

                //dd($order);
                $order->save();
                $order->user->withdraw($order->amount);

                session()->flash('alert-message', [
                    'type' => 'success',
                    'title' => 'Successful',
                    'message' => $data['message']
                ]);

            } elseif ($data['code'] == 'failure') {

                $order->status = 'failed';
                $order->save();
                session()->flash('alert-message', [
                    'type' => 'danger',
                    'title' => 'Error',
                    'message' => $data['message']
                ]);

            }

        } catch (ClientException $e) {
            $order->status = 'failed';
            $order->save();

            session()->flash('alert-message', [
                'type' => 'danger',
                'title' => 'Error',
                'message' => $e->getResponse()->getReasonPhrase()
            ]);

        }

        return redirect()->back();

    }

    public function recharge(Request $request)
    {

        // Validate request data
        $validatedData = $request->validate([

            'phone' => 'required|string',
            'service_id' => 'required|string',
            'smartcard_number' => 'required|string',
            'variation_id' => 'required|string',

        ]);

        dd($request->all());

        $client = new Client();

        if ($request->amount > \Auth::user()->balance) {

            session()->flash('alert-message', [
                'type' => 'danger',
                'title' => 'Error',
                'message' => 'Insufficient wallet balance'
            ]);

            return redirect()->back();
        }

        $settings = Datasetting::all()->first();

        // create an order
        $order = new Order();
        $order->user_id = Auth::id();
        $order->service_id = $request->service_id;
        $order->smartcard_number = $request->smartcard_number;
        $order->variation_id = $request->variation_id;
        $order->status = 'pending';
        $order->order_type = 'data';
        $order->save();

        // Prepare query parameters
        $queryParams = [
            'username' =>  $settings->username,
            'password' => $settings->password,
            'phone' => $validatedData['phone'],
            'service_id' => $validatedData['service_id'],
            'smartcard_number' => $validatedData['smartcard_number'],
            'variation_id' => $validatedData['variation_id'],
        ];

        // Build URL with query parameters

        $settings = Tvsetting::all()->first();
        $api = $settings->api;

        $url = $api . '?' . http_build_query($queryParams);

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

                $order->phone = $data['data']['phone'];
                $order->service_id = $data['data']['service_id'];
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

    public function recharge11(Request $request)
    {
        // Replace these values with your actual credentials
        $username = 'revolutpay';
        $password = 'revolutpay123';
        $phone = $request->input('phone');
        $service_id = $request->input('service_id'); // Assuming amount is sent in the request
        $smartcard_number = $request->input('smartcard_number');
        $variation_id = $request->input('variation_id');

        // Initialize Guzzle client
        $client = new Client();

        // Endpoint URL
        $endpoint = 'https://vtu.ng/wp-json/api/v1/tv';

        // Query parameters
        $queryParams = [
            'username' => $username,
            'password' => $password,
            'phone' => $phone,
            'service_id' => $service_id,
            'smart_card_number' => $smartcard_number,
            'variation_id' => $variation_id,
        ];

        try {
            // Make GET request to recharge TV
            $response = $client->get($endpoint, [
                'query' => $queryParams,
            ]);

            // Get response body
            $body = $response->getBody();

            // Parse JSON response
            $result = json_decode($body, true);

            // Check if the request was successful
            if ($result['status'] === 'success') {
                return response()->json(['message' => 'Recharge successful!', 'transaction_id' => $result['transaction_id']]);
            } else {
                return response()->json(['error' => 'Recharge failed: ' . $result['message']], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }


    public function addcabletvprice(Request $request)
    {

        $user = Auth::user();
        $tvprice  = Tvprice::find($request->id);
        return view('addcabletvprice', compact('tvprice', 'user'));
    }


    public function addcabletvprices(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'service_id' => 'required|string',
            'variation_id' => 'required|string',

            'price' => 'required|int',

        ]);

        // Create a new DataPrice instance
        $tvprice = new Tvprice();


        //$tvprice->smartcard_number = $request->input('smartcard_number');
        $tvprice->service_id = $request->input('service_id');
        $tvprice->variation_id = $request->input('variation_id');
        $tvprice->price = $request->input('price');


        $tvprice->save();

        return redirect()->route('listcabletvprices')->with('success', 'Cable TV price added successfully!');
    }






    public function listcabletvprices(Request $request)
    {

        $user = Auth::user();
        $tvprices  = Tvprice::all();
        return view('listcabletvprices', compact('tvprices', 'user'));
    }



    public function listcabletvpriceedit($id)

    {

        $user = Auth::user();
        $tvprice = Tvprice::find($id);
        return view('listcabletvpriceedit', compact('tvprice', 'user'));
    }

    public function listcabletvpriceupdate(Request $request)
    {


        $tvprice  = Tvprice::find($request->id);

        $tvprice->variation_id = request('variation_id');

        $tvprice->service_id = request('service_id');



        $tvprice->price = request('price');


        $tvprice->save();





        return redirect('listcabletvprices');
    }


    public function deletecabletvprice($id)
    {
        // Find the record by its ID
        $record = Tvprice::find($id);

        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        // Delete the record
        $record->delete();

        return redirect('listcabletvprices');
    }


    public function getTVPlans(Request $request)
    {
        $request->validate([
            'service_id' => 'required|string'
        ]);

        $tvprices = TVPrice::where('service_id', $request->service_id)->get();

        return response()->json([
            'success' => true,
            'data' => $tvprices
        ]);
    }
}
