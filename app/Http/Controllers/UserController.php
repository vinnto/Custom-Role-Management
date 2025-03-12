<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RoleModel;
use Illuminate\Http\Request;
use App\Models\PermissionRoleModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list()
    {
        $permissionRole = PermissionRoleModel::getPermission('User', Auth::user()->role_id);
        if (empty($permissionRole)) {
            abort(404);
        }

        $data['permissionAdd'] = PermissionRoleModel::getPermission('Add User', Auth::user()->role_id);
        $data['permissionEdit'] = PermissionRoleModel::getPermission('Edit User', Auth::user()->role_id);
        $data['permissionDelete'] = PermissionRoleModel::getPermission('Delete User', Auth::user()->role_id);

        $data['getUser'] = User::getRecord();
        return view('panel.user.list', $data);
    }

    public function add()
    {
        $data['getRole'] = RoleModel::getRecord();
        return view('panel.user.add', $data);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->role_id = $request->role_id;
        $user->save();

        return redirect('panel/user')->with('success', 'User added successfully');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        $data['getRole'] = RoleModel::getRecord();
        return view('panel.user.edit', $data);
    }

    public function update(Request $request)
    {
        $user = User::getSingle($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->role_id = $request->role_id;
        $user->save();

        return redirect('panel/user')->with('success', 'User updated successfully');
    }

    public function delete($id)
    {
        $user = User::getSingle($id);
        $user->delete();

        return redirect('panel/user')->with('success', 'User deleted successfully');
    }
}
