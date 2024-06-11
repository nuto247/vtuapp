<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Throwable;

class NINController extends Controller
{
    public function form()
    {

        $ninDatas = session('nin_details');

        return view('nin.form', compact('ninDatas'));
    }

    public function verify(Request $request)
    {
        //dd($request->all());

        $request->validate([
            "nin" => "required",
            //"firstname" => "required",
            //"lastname" => "required"
        ]);

        $clientId = 'F68U63DXQYA39JHV4V9Q';
        $secret = '67eefbf0d24c4d64917340dfde8ed169';

        $nin = $request->nin;
        //$lastname = $request->lastname;
        //$firstname = $request->firstname;

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
                //'lastname' => $lastname,
               // 'firstname' => $firstname
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
}
