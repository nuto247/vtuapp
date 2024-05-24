<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variation;

class VariationController extends Controller
{
    //

    public function showForm()
    {
        $variations = Variation::all();
        return view('form', compact('variations'));
    }

    public function getDetails($variation_id)
    {
        $variation = Variation::with(['network', 'plan', 'price'])->find($variation_id);

        return response()->json($variation);
    }
}


