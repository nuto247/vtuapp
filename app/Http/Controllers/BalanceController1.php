<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class BalanceController extends Controller
{
    public function index()
    {
        // Initialize Guzzle client
        $client = new Client();

        try {
            // Make a GET request to the API
            $response = $client->request('GET', 'https://vtu.ng/wp-json/api/v1/balance');

            // Get response body
            $body = $response->getBody();

            // Convert JSON response to array
            $data = json_decode($body, true);

            // Check if the response is successful
            if ($response->getStatusCode() == 200) {
                // Display balance on view
                return view('balance.index', ['balance' => $data['balance']]);
            } else {
                // Handle error response
                return view('balance.error', ['message' => 'Error retrieving balance']);
            }
        } catch (\Exception $e) {
            // Handle exceptions
            return view('balance.error', ['message' => $e->getMessage()]);
        }
    }
}
