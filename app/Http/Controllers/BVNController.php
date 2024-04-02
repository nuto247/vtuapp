<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BVNController extends Controller
{
    public function verifyBVN($bvn)
    {
        $baseUrl = 'https://api.quickverify.com.ng/verification/bvn';

        $response = Http::withHeaders([
            'Authorization' => 'Bearer YOUR_API_KEY', // Replace YOUR_API_KEY with your actual API key
            'Accept' => 'application/json',
        ])->post($baseUrl, [
            'bvn' => $bvn,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            // Handle successful response
            return $data;
        } else {
            // Handle error response
            $errorCode = $response->status();
            $errorMessage = $response->body();
            return response()->json(['error' => "Error: $errorCode - $errorMessage"], $errorCode);
        }
    }
}
