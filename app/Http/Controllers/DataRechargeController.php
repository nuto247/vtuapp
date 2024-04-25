<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Dataprice;

class DataRechargeController extends Controller
{

    public function rechargeData1()
    {
        $user = Auth::user();
        $dataprice = Dataprice::all();

        return view('recharge-data1', compact('user', 'dataprice'));
    }
    public function getRechargeDataPlans(Request $request)
    {
        $dataprice = Dataprice::where('network', $request->network)->get();

        return response([
            'success' => true,
            'data' => $dataprice
        ]);

    }

    public function mtn()
    {
        $user = Auth::user();

        $dataprice = Dataprice::where('network', 'mtn')->get();
        $dataprices = Dataprice::all();

        return view('mtn', compact('user', 'dataprice'));
    }

    public function rechargeData(Request $request)
    {

        // Validate request data
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'phone' => 'required|string',
            'network_id' => 'required|string',
            'variation_id' => 'required|string',

        ]);

        //dd($request->all());

        $client = new Client();

        if ($request->amount > \Auth::user()->balance) {

            session()->flash('alert-message', [
                'type' => 'danger',
                'title' => 'Error',
                'message' => 'Insufficient wallet balance'
            ]);

            return redirect()->back();
        }

        // create an order
        $order = new Order();
        $order->user_id = Auth::id();
        $order->network = $request->network_id;
        $order->variation_id = $request->variation_id;
        $order->status = 'pending';
        $order->order_type = 'data';
        $order->save();

        // Prepare query parameters
        $queryParams = [
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
            'phone' => $validatedData['phone'],
            'network_id' => $validatedData['network_id'],
            'variation_id' => $validatedData['variation_id'],
        ];

        // Build URL with query parameters
        $url = 'https://vtu.ng/wp-json/api/v1/data?' . http_build_query($queryParams);

        // Make API call to recharge data
        $client = new Client();

        try {

            $response = $client->get($url);

            $data = json_decode($response->getBody(), true);

            // Check if recharge was successful
            if ($data['code'] == 'success') {
                $amount = preg_replace('/[^0-9]/', '', $data['data']['amount']);
                $order->status = 'success';
                $order->order_reference = $data['data']['order_id'];
                $order->data_plan = $data['data']['data_plan'];
                $order->phone = $data['data']['phone'];
                $order->amount = $amount;
                $order->save();
                $order->user->withdraw($order->amount);

                session()->flash('alert-message', [
                    'type' => 'success',
                    'title' => 'Successful',
                    'message' => 'Your Data recharge of ' . $data['data']['data_plan']  . ' was successful'
                ]);
            } else {

                session()->flash('alert-message', [
                    'type' => 'danger',
                    'title' => 'Error',
                    'message' => 'Data recharge failed'
                ]);
            }
        } catch (\Exception $e) {
            session()->flash('alert-message', [
                'type' => 'danger',
                'title' => 'Error',
                'message' => $e->getMessage()
            ]);
            //return response()->json(['message' => $e->getMessage()], 500);
        }

        return redirect()->back();
    }

    public function listdataprices()
    {
        $user = Auth::user();

        $dataprice = Dataprice::all();

        return view('listdataprice', compact('user', 'dataprice'));
    }

    public function listdatapriceedit($id)

    {

        $user = Auth::user();
        $dataprice = Dataprice::find($id);
        return view('listdatapriceedit', compact('dataprice', 'user'));
    }

    public function listdatapriceupdate(Request $request)
    {


        $dataprice  = Dataprice::find($request->id);

        $dataprice->variation_id = request('variation_id');

        $dataprice->network = request('network');
        $dataprice->plan = request('plan');

        $dataprice->price = request('price');

        $dataprice->save();





        return redirect('listdataprices');
    }


    public function deletedataprice($id)
    {
        // Find the record by its ID
        $record = Dataprice::find($id);

        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        // Delete the record
        $record->delete();

        return redirect('listdataprices');
    }


    public function adddataprice(Request $request)
    {

        $user = Auth::user();
        $dataprice  = Dataprice::find($request->id);
        return view('adddataprices', compact('dataprice', 'user'));
    }


    public function adddataprices(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'network' => 'required|string',
            'plan' => 'required|string',
            'variation_id' => 'required|int',
            // Add other validation rules for your other form fields
        ]);

        // Create a new DataPrice instance
        $dataprice = new Dataprice();

        // Assign values from the form to the model attributes

        $dataprice->variation_id = $request->input('variation_id');
        $dataprice->network = $request->input('network');
        $dataprice->plan = $request->input('plan');

        $dataprice->price = $request->input('price');
        // Assign other form values to corresponding model attributes

        // Save the data to the database
        $dataprice->save();

        // Optionally, you can redirect the user to a different page
        // or return a response indicating success
        return redirect()->route('listdataprices')->with('success', 'Data price added successfully!');
    }




    public function addward(Request $request)
    {
        $user = Auth::user();
        $state = State::all();
        $states = State::all();
        $lgas = Lga::all();
        $wards = Ward::all();
        $punit = Punit::all();
        return view('admin.addward', compact('state', 'lgas', 'wards', 'states', 'punit', 'user'));
    }

    public function formshow(Request $request)
    {
        $dataprices = Dataprice::all();

        $user = Auth::user();

        return view('formshow', compact('user', 'dataprices'));
    }


    public function getSubcategories(Request $request)
    {
        $subcategories = Subcategory::where('category_id', $request->category_id)->pluck('name', 'id');
        return response()->json($subcategories);
    }
}
