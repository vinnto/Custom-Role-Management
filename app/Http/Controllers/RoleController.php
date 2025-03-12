<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use Illuminate\Http\Request;
use App\Models\PermissionModel;
use App\Models\PermissionRoleModel;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function list()
    {
        $permissionRole = PermissionRoleModel::getPermission('Role', Auth::user()->role_id);
        if (empty($permissionRole)) {
            abort(404);
        }

        $data['permissionAdd'] = PermissionRoleModel::getPermission('Add Role', Auth::user()->role_id);
        $data['permissionEdit'] = PermissionRoleModel::getPermission('Edit Role', Auth::user()->role_id);
        $data['permissionDelete'] = PermissionRoleModel::getPermission('Delete Role', Auth::user()->role_id);

        $data['getRecord'] = RoleModel::getRecord();
        return view('panel.role.list', $data);
    }

    public function add()
    {
        $getPermission = PermissionModel::getRecord();
        $data['getPermission'] = $getPermission;
        return view('panel.role.add', $data);
    }

    public function store(Request $request)
    {
        $role = new RoleModel();
        $role->name = $request->name;
        $role->save();

        PermissionRoleModel::InsertUpdateRecord($request->permission_id, $role->id);

        return redirect('panel/role')->with('success', 'Role created successfully');
    }

    public function edit($id)
    {
        $data['getRecord'] = RoleModel::find($id);
        $data['getPermission'] =  PermissionModel::getRecord();
        $data['getRolePermission'] =  PermissionRoleModel::getRolePermission($id);
        return view('panel.role.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role = RoleModel::find($request->id);
        $role->name = $request->name;
        $role->save();

        PermissionRoleModel::InsertUpdateRecord($request->permission_id, $role->id);

        return redirect('panel/role')->with('success', 'Role updated successfully');
    }

    public function delete($id)
    {
        $role = RoleModel::find($id);
        $role->delete();

        return redirect('panel/role')->with('success', 'Role deleted successfully');
    }
}
