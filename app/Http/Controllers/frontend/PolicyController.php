<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function return()
    {
        return view('frontend.policy.return');
    }

    public function transport()
    {
        return view('frontend.policy.transport');
    }
}
