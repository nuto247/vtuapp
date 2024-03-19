<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;


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
            'username' => 'required|string',
            'password' => 'required|string',
            'phone' => 'required|string',
            'network_id' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        // Create Guzzle HTTP client
        $client = new Client();

        try {
            // Make API request to recharge airtime with parameters in URL query string
            $response = $client->get('https://vtu.ng/wp-json/api/v1/airtime', [
                'query' => [
                    'username' => $request->username,
                    'password' => $request->password,
                    'phone' => $request->phone,
                    'network_id' => $request->network_id,
                    'amount' => $request->amount,
                ]
            ]);

            // Decode response body
            $responseData = $response->getBody()->getContents();

            // Airtime recharge successful
            return response()->json([
                'success' => true,
                'message' => 'Airtime recharge successful',
                'data' => json_decode($responseData),
            ], 200);
        } catch (RequestException $e) {
            // Handle GuzzleHttp exception
            $responseBody = $e->getResponse()->getBody()->getContents();
            $statusCode = $e->getResponse()->getStatusCode();

            // Airtime recharge failed
            return response()->json([
                'success' => false,
                'message' => 'Airtime recharge failed',
                'error' => json_decode($responseBody),
            ], $statusCode);
        }
    }
}
