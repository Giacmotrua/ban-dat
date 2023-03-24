<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $data = Contacts::checkSearch($request->keyword)->paginate(5);
        return view('backend.contact.index', compact('data'));
    }

    public function delete($id)
    {
        $id = is_numeric($id) ? $id : 0;
        if ($id > 0){
            $data = Contacts::findOrFail($id);
            $del = $data->delete();
            if ($del) {
                return redirect()->back()->with('success', 'Xoá thành công');
            }
            return redirect()->back()->with('message', 'Xoá thất bại');
        }
    }
}
