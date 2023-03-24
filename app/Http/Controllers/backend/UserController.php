<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Models\Roles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EditPostUser;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $listUser = User::checkSearch($request->keyword)->paginate(5);
        foreach ($listUser as $item) {
            $item['roles'] = User::find($item->id)->roles()->exists() ? User::find($item->id)->roles()->get() : null;
        }
        return view('backend.user.index', compact('listUser'));
    }

    public function create()
    {
        $roles = Roles::get();
        return view('backend.user.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        try {
            $data = $request->all();
            $data['password'] = Hash::make($request->password);
            $nameImage = null;
            if ($request->hasFile('image')) {
                if ($request->file('image')->isValid()) {
                    $nameImage = $request->file('image')->hashName();
                    $request->file('image')->store('public/images');
                }
            }
            if($nameImage === null){
                return redirect()->route('admin.user.create')->with('invalidLogo', 'Can not upload logo brand');
            }
            $data['image'] = $nameImage;
            $user = User::create($data);
            $user->roles()->attach($data['roles']);
            return redirect()->route('admin.user')->with('success', 'Thêm thành công');
        }catch (\Exception $e){
            if (Storage::exists('public/images/'.$nameImage)){
                Storage::delete('public/images/'.$nameImage);
            }
            return redirect()->back()->with('message', 'co loi');
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Roles::get();
        return view('backend.user.edit', compact('user', 'roles'));
    }

    public function update(EditPostUser $request, $id)
    {
        $user = User::findOrFail($id);
        $newUser = $request->all();
        $oldImage = $user->image;
        $nameImage = null;
        if ($newUser['password'] !== null) {
            $validatorPass = Validator::make(
                $request->all(),
                ['password' => 'gte:8'],
                ['password.gte' => 'Mật khẩu phải từ 8 ký tự trở lên']
            );
            if ($validatorPass->fails()) {
                return redirect()
                    ->route('admin.user.edit', $id)
                    ->withErrors($validatorPass)
                    ->withInput();
            }
        }
        if ($request->hasFile('image')){
            if ($request->file('image')->isValid()) {
                $nameImage = $request->file('image')->hashName();
            }
        }
        if ($nameImage !== null){
            if ($request->password) {
                $validator = Validator::make(
                    $request->all(),
                    ['image' => 'mimes:jpg,png,jpeg'],
                    ['image.mimes' => 'Ảnh phải là định dạng jpg,png,jpeg']
                );
                if ($validator->fails()) {
                    return redirect()
                        ->route('admin.user.edit', $id)
                        ->withErrors($validator)
                        ->withInput();
                }
            }
            $newUser['image'] = $nameImage;
        }
        $user->roles()->sync($newUser['roles']);
        $update = $user->update($newUser);
        if ($update) {
            if ($nameImage !== null) {
                $request->file('image')->store('public/images');
                if (Storage::exists('public/images/'.$oldImage)){
                    Storage::delete('public/images/'.$oldImage);
                }
            }
            return redirect()->route('admin.user')->with('success', 'Cập nhập tài khoản nhân viên thành công');
        }
        return redirect()->back()->with('message', 'Cập nhập tài khoản nhân viên thất bại');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $del = $user->delete();
        if ($del) {
            return redirect()->route('admin.user')->with('success', 'Xoá tài khoả nhân viên thành công');
        }
        return redirect()->route('admin.user')->with('message', 'Xoá tài khoả nhân viên thất bại');
    }
}
