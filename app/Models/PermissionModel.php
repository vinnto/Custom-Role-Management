<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PermissionModel extends Model
{
    use HasFactory;

    protected $table = 'permission';

    static public function getSingle($id)
    {
        return RoleModel::find($id);
    }

    static public function getRecord()
    {
        $getPermission = PermissionModel::select('groupby', DB::raw('MIN(id) as id_permission'))
            ->groupBy('groupby')
            ->orderBy('groupby')
            ->get();

        $result = array();
        foreach ($getPermission as $value) {
            $getPermissionGroup = PermissionModel::getPermissionGroup($value->groupby);
            $data = array();
            $data['id'] = $value->id_permission;
            $data['name'] = $value->groupby;
            $group = array();

            foreach ($getPermissionGroup as $valueG) {
                $groupData = array();
                $groupData['id']  = $valueG->id;
                $groupData['name']  = $valueG->name;
                $group[] = $groupData;
            }

            $data['group'] = $group;
            $result[] = $data;
        }

        return $result;
    }

    static public function getPermissionGroup($groupby)
    {
        return PermissionModel::where('groupby', '=', $groupby)->get();
    }
}
