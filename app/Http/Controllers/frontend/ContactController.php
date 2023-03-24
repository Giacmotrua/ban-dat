<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Http\Requests\StoreCustomerMessageRequest as CMRequest;

class ContactController extends Controller
{
    public function index()
    {
            return view('frontend.contact.index');
    }

    public function message(CMRequest $request)
    {
        $message = $request->all();
        Contacts::create($message);
        return redirect()->back()->with('success', 'Gửi tin nhắn thành công');
    }
}
