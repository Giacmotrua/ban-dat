<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Products;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home.index');
    }
}
