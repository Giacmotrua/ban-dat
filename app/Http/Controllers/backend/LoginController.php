<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ErrorLoginAdmin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(!Auth::guard('admin')->check()) {
            return view('backend.login.index');
        }
        return redirect()->route('admin.dashboard');
    }


    public function handleLogin(ErrorLoginAdmin $request)
    {
        $account = [
            'email' => $request->username,
            'password' => $request->password
        ];
        if (Auth::guard('admin')->attempt($account)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('status', 'Đăng nhập không thành công');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
