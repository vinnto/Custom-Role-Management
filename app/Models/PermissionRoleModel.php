<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PermissionRoleModel extends Model
{
    use HasFactory;

    protected $table = 'permission_role';

    static public function InsertUpdateRecord($permission_ids, $role_id)
    {
        PermissionRoleModel::where('role_id', '=', $role_id)->delete();

        foreach ($permission_ids as $permission_id) {
            $role = new PermissionRoleModel;
            $role->permission_id = $permission_id;
            $role->role_id = $role_id;
            $role->save();
        }
    }

    static public function getRolePermission($role_id)
    {
        return PermissionRoleModel::select('permission_id', 'role_id')
            ->where('role_id', '=', $role_id)
            ->get();
    }

    static public function getPermission($slug, $role_id)
    {
        return PermissionRoleModel::select('permission_role.id')
            ->join('permission', 'permission.id', '=', 'permission_role.permission_id')
            ->where('permission_role.role_id', '=', $role_id)
            ->where('permission.slug', '=', $slug)
            ->count();
    }
}
