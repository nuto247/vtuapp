<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BVNVerificationController extends Controller
{
    public function verify(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'bvn' => 'required|numeric|digits:11',
        ]);

        // Retrieve the BVN from the request
        $bvn = $request->input('bvn');

        // Call the verifyBVN method to perform the verification
        $verificationData = $this->verifyBVN($bvn);

        // Return the verification data
        return response()->json($verificationData);
    }

    private function verifyBVN($bvn)
    {
        $apiUrl = 'https://api.quickverify.com.ng/verification/bvn';
        $apiKey = 'GLgEtcre26Q1O8wmh91w69T3If3vfObP'; // Replace this with your actual API key

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Accept' => 'application/json',
        ])->get($apiUrl, [
            'bvn' => $bvn,
        ]);

        // Check if the request was successful
        if ($response->successful()) {
            $verificationData = $response->json();

            // Return the verification data
            return $verificationData;
        } else {
            // Handle API error
            $errorResponse = [
                'error' => 'Failed to verify BVN.',
                'status_code' => $response->status(),
                'message' => $response->json()['message'] ?? 'Unknown error occurred.',
            ];

            // Return error response
            return $errorResponse;
        }
    }
}
