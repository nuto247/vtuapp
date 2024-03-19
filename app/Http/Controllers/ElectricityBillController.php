<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class ElectricityBillController extends Controller
{

    public function electricity()
    {
        $user = Auth::user();

        return view('electricity1', compact('user'));
    }
    public function pay(Request $request)
    {
        // Replace these values with your actual credentials and other details
        $username = 'revolutpay';
        $password = 'revolutpay123';
        $phone = $request->input('phone');
        $meternumber = $request->input('meternumber');
        $service_id = $request->input('service_id');
        $variation_id = $request->input('variation_id');
        $amount = $request->input('amount');

        // Initialize Guzzle client
        $client = new Client();

        // Endpoint URL
        $endpoint = 'https://vtu.ng/wp-json/api/v1/electricity';

        // Query parameters
        $queryParams = [
            'username' => $username,
            'password' => $password,
            'phone' => $phone,
            'meternumber' => $meternumber,
            'service_id' => $service_id,
            'variation_id' => $variation_id,
            'amount' => $amount,
        ];

        try {
            // Make GET request to pay electricity bill
            $response = $client->get($endpoint, [
                'query' => $queryParams,
            ]);

            // Get response body
            $body = $response->getBody();

            // Parse JSON response
            $result = json_decode($body, true);

            // Check if the request was successful
            if ($result['status'] === 'success') {
                return response()->json(['message' => 'Payment successful!', 'transaction_id' => $result['transaction_id']]);
            } else {
                return response()->json(['error' => 'Payment failed: ' . $result['message']], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }
}
