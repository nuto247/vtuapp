<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BVNController extends Controller
{
    /**
     * Verify BVN details match.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verifyBVN(Request $request)
    {
        $baseUrl = config('app.bvn_verification_base_url'); // Assuming you have configured this in your environment variables or config file
        $endpoint = '/api/v1/vas/bvn-details-match';
        $url = $baseUrl . $endpoint;

        // Validate request data
        $validatedData = $request->validate([
            'bvn' => 'required|digits:11',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'date_of_birth' => 'required|date',
        ]);

        try {
            // Make HTTP request to BVN verification service
            $response = Http::post($url, $validatedData);

            // Check if the request was successful
            if ($response->successful()) {
                // BVN details match
                return response()->json(['message' => 'BVN details match'], 200);
            } else {
                // BVN details do not match
                return response()->json(['message' => 'BVN details do not match'], 400);
            }
        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json(['error' => 'An error occurred while processing your request'], 500);
        }
    }
}
