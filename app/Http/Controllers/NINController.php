<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Throwable;
use PDF; // Import the PDF facade

class NINController extends Controller
{
    public function form()
    {

        $ninDatas = session('nin_details');

        //dd(collect($ninDatas));

        return view('nin.form', compact('ninDatas'));
    }

    public function bvn()
    {

        $bvnDatas = session('bvn_details');

        //dd(collect($ninDatas));

        return view('nin.bvnform', compact('bvnDatas'));
    }

    public function bvnverify()
    {
        $request->validate([
            "nin" => "required",
            "firstname" => "required",
            "lastname" => "required"
        ]);

        $clientId = '9Z60Q3P2TQAB3QIB6HP2';
        $secret = 'a2f604729ce24cc8ac769fb4f7fbc0b2';

        $nin = $request->nin;
        $lastname = $request->lastname;
        $firstname = $request->firstname;

        try {

            $response = Http::asForm()->post('https://api.qoreid.com/token', [
                'clientId' => $clientId,
                'secret' => $secret
            ]);

            $accessToken = $response->object();

            $token = $accessToken->accessToken;

        } catch (Exception $e) {

            //report($e);

            session()->flash('alert-message', [
                'type' => 'danger',
                'title' => 'Error',
                'message' => 'NIN verification falled: ' . $e->getMessage()
            ]);

        }

        try {

            $res = Http::withToken($token)->asForm()->post('{{baseUrl}}/v1/ng/identities/face-verification/bvn' . $nin, [
                'lastname' => $lastname,
                'firstname' => $firstname
            ])->throw();

            session()->put('nin_details', $res->collect());

        } catch (Exception $e) {

            session()->flash('alert-message', [
                'type' => 'danger',
                'title' => 'Error',
                'message' => 'NIN verification falled: ' . data_get($e->getMessage(), 'message')
            ]);

        }

        return redirect()->back();





    }



    public function getBvnPremium($bvnNumber)
    {
        // Validate the BVN number format (example: must be 11 digits)
        if (!preg_match('/^\d{11}$/', $bvnNumber)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid BVN number format. It must be 11 digits.'
            ], 400);
        }

        // Mocked response for the sake of this example
        // In a real application, you would query a database or an external API
        $bvnData = [
            'bvn' => $bvnNumber,
            'first_name' => $firstname,
            'last_name' => 'Doe',
            'date_of_birth' => '1990-01-01',
            'phone_number' => '08012345678',
            'email' => 'john.doe@example.com',
            'address' => '123 Example Street, Lagos',
            'status' => 'active',
        ];

        return response()->json([
            'status' => 'success',
            'data' => $bvnData
        ], 200);
    }

    public function showBvnForm()
    {
        return view('bvn');
    }
    

    public function verify(Request $request)
    {
        //dd($request->all());

        $request->validate([
            "nin" => "required",
            "firstname" => "required",
            "lastname" => "required"
        ]);

        $clientId = '9Z60Q3P2TQAB3QIB6HP2';
        $secret = 'a2f604729ce24cc8ac769fb4f7fbc0b2';

        $nin = $request->nin;
        $lastname = $request->lastname;
        $firstname = $request->firstname;

        try {

            $response = Http::asForm()->post('https://api.qoreid.com/token', [
                'clientId' => $clientId,
                'secret' => $secret
            ]);

            $accessToken = $response->object();

            $token = $accessToken->accessToken;

        } catch (Exception $e) {

            //report($e);

            session()->flash('alert-message', [
                'type' => 'danger',
                'title' => 'Error',
                'message' => 'NIN verification falled: ' . $e->getMessage()
            ]);

        }

        try {

            $res = Http::withToken($token)->asForm()->post('https://api.qoreid.com/v1/ng/identities/nin/' . $nin, [
                'lastname' => $lastname,
                'firstname' => $firstname
            ])->throw();

            session()->put('nin_details', $res->collect());

        } catch (Exception $e) {

            session()->flash('alert-message', [
                'type' => 'danger',
                'title' => 'Error',
                'message' => 'NIN verification falled: ' . data_get($e->getMessage(), 'message')
            ]);

        }

        return redirect()->back();

    }

    public function printPage()
    {
        // Load a view and pass data to it
        $data = ['title' => 'My PDF Title', 'content' => 'This is the content of the PDF'];
        $pdf = PDF::loadView('pdf.my_pdf_view', $data);
        
        // Stream the generated PDF to the browser
        return $pdf->stream('document.pdf');
    }
}
