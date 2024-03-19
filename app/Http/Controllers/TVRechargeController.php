<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;


class TVRechargeController extends Controller
{
    public function rechargetv()
    {
        $user = Auth::user();

        return view('tv_recharge1', compact('user'));
    }

    public function recharge(Request $request)
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
}
