<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class VerifyCustomerController extends Controller
{
    public function verify(Request $request)
    {
        // Replace these values with your actual credentials and other details
        $username = 'revolutpay';
        $password = 'revolutpay123';
        $customer_id = $request->input('customer_id');
        $service_id = $request->input('service_id');
        $variation_id = $request->input('variation_id');

        // Initialize Guzzle client
        $client = new Client();

        // Endpoint URL
        $endpoint = 'https://vtu.ng/wp-json/api/v1/verify-customer';

        // Query parameters
        $queryParams = [
            'username' => $username,
            'password' => $password,
            'customer_id' => $customer_id,
            'service_id' => $service_id,
            'variation_id' => $variation_id,
        ];

        try {
            // Make GET request to verify customer
            $response = $client->get($endpoint, [
                'query' => $queryParams,
            ]);

            // Get response body
            $body = $response->getBody();

            // Parse JSON response
            $result = json_decode($body, true);

            // Check if the request was successful
            if ($result['status'] === 'success') {
                return response()->json(['message' => 'Customer verified!', 'customer_info' => $result['customer_info']]);
            } else {
                return response()->json(['error' => 'Verification failed: ' . $result['message']], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }
}
