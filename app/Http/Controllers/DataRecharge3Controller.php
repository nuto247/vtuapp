<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class DataRechargeController extends Controller
{

    public function rechargeData1()
    {
        $user = Auth::user();

        return view('recharge-data1', compact('user'));
    }
    public function rechargeData(Request $request)
    {
        // Dump and die to inspect the $request object
        //dd($request);

        // Validate request data
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'phone' => 'required|string',
            'network_id' => 'required|string',
            'variation_id' => 'required|string',
           
        ]);

        // Prepare query parameters
        $queryParams = [
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
            'phone' => $validatedData['phone'],
            'network_id' => $validatedData['network_id'],
            'variation_id' => $validatedData['variation_id'],
           
        ];


        $data = [
            'success' => true,
            'message' => 'Data recharge successful',
        ];

        // Build URL with query parameters
        $url = 'https://vtu.ng/wp-json/api/v1/data?' . http_build_query($queryParams);

        // Make API call to recharge data
        $client = new Client();
        try {
            $response = $client->get($url);

            $data = json_decode($response->getBody(), true);

            // Check if recharge was successful
            if ($data['success']) {
                return response()->json(['message' => 'Data recharge successful'], 200);
            } else {
                return response()->json(['message' => 'Data recharge failed'], 400);
            }
        } catch (\Exception $e) {
            // Handle exception
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
