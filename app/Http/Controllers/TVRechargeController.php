<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Models\Tvprice;

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

    public function getTvPlans(Request $request)
    {
        $plans = Tvprice::where('tvnetwork', $request->network)->get();

        return response([
            'success' => true,
            'data' => $plans
        ]);

    }

    public function rechargetv()
    {
        $user = Auth::user();

        $tvs = Tvprice::all();

        return view('tv_recharge1', compact('user', 'tvs'));
    }

    public function recharge(Request $request)
    {
        // Replace these values with your actual credentials
        $username = 'revolutpay';
        $password = 'uchetochukwu@gmail.com';
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

            'variation_id' => 'required|int',
            // Add other validation rules for your other form fields
        ]);

        // Create a new DataPrice instance
        $tvprice = new Tvprice();

        // Assign values from the form to the model attributes

        $tvprice->variation_id = $request->input('variation_id');
        $tvprice->service_id = $request->input('service_id');
        $tvprice->tvnetwork = $request->input('tvnetwork');
        $tvprice->tvpackage = $request->input('tvpackage');
        $tvprice->price = $request->input('price');

        // Assign other form values to corresponding model attributes

        // Save the data to the database
        $tvprice->save();

        // Optionally, you can redirect the user to a different page
        // or return a response indicating success
        return redirect()->route('listcabletvprices')->with('success', 'Cable TV price added successfully!');
    }



    public function listcabletvprices(Request $request)
    {

        $user = Auth::user();
        $tvprice  = Tvprice::all();
        return view('listcabletvprices', compact('tvprice', 'user'));
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

        $tvprice->tvnetwork = request('tvnetwork');


        $tvprice->tvpackage = request('tvpackage');


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





}
