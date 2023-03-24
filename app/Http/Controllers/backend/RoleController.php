<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\Permissions;
use App\Http\Requests\StoreRoleRequest;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Roles::checkSearch($request->keyword)->paginate(5);
        foreach ($roles as $item) {
            $item['permissions'] = Roles::find($item->id)->permission()->exists() ? Roles::find($item->id)->permission()->get() : null;
        }
        return view('backend.role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permissions::get();
        return view('backend.role.add', compact('permissions'));
    }

    public function store(StoreRoleRequest $request)
    {
        $data = $request->all();
        $roles = Roles::create($data);
        foreach ($data['permissions'] as $item) {
            $roles->permission()->attach($item);
        }
        return redirect()->route('admin.role')->with('success', 'Thêm vai trò thành công');
    }

    public function edit($id)
    {
        $role = Roles::findOrFail($id);
        $permissions = Permissions::get();
        return view('backend.role.edit', compact('role','permissions'));
    }

    public function update(StoreRoleRequest $request, $id)
    {
        $role = Roles::findOrFail($id);
        $newRole = $request->all();
        $role->permission()->sync($newRole['permissions']);
        $role->update($newRole);

        return redirect()->route('admin.role')->with('success', 'Cập nhập vai trò thành công');
    }

    public function delete($id)
    {
        $role = Roles::findOrFail($id);
        $role->delete();
        return redirect()->route('admin.role')->with('success', 'Xoá vai trò thành công');
    }
}
