<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;

class LocationController extends Controller
{
    public function province()
    {
        $data = Province::get();
        return response()->json(['data' => $data]);
    }

    public function district(Request $request)
    {
        $request->validate([
            'id'=>'required|numeric',
        ]);
        $data = District::where('province_id', '=', $request->id)->get();
        return response()->json(['data' => $data]);
    }

    public function ward(Request $request)
    {
        $request->validate([
            'id'=>'required|numeric',
        ]);
        $data = Ward::where('district_id', '=', $request->id)->get();
        return response()->json(['data' => $data]);
    }
}
