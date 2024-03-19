<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class DataRechargeController extends Controller
{
    public function rechargeData(Request $request)
    {
        // Validate request inputs
        dd($request);

        // Create Guzzle HTTP client
        $client = new Client();

        try {
            // Make API request to recharge data
            $response = $client->get('https://vtu.ng/wp-json/api/v1/data', [
                'query' => [
                    'username' => $request->username,
                    'password' => $request->password,
                    'phone' => $request->phone,
                    'network_id' => $request->network_id,
                    'variation_id' => $request->variation_id,
        
                ]

               
            ]);
      
            // Decode response body
            $responseData = $response->getBody()->getContents();
         
            // Data recharge successful
            return response()->json([
                'success' => true,
                'message' => 'Data recharge successful',
                'data' => json_decode($responseData),
            ], 200);
        } catch (RequestException $e) {
            // Handle GuzzleHttp exception
            $responseBody = $e->getResponse()->getBody()->getContents();
            $statusCode = $e->getResponse()->getStatusCode();

            // Data recharge failed
            return response()->json([
                'success' => false,
                'message' => 'Data recharge failed',
                'error' => json_decode($responseBody),
            ], $statusCode);
        }
    }
}
