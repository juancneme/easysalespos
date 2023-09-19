<?php

namespace App\Models\Management;

use Zizaco\Entrust\EntrustRole;
use \DB;

class Role extends EntrustRole {


    public function permission() {
        return $this->belongsToMany('App\Models\Management\Permission');
    }

    public function users() {
        return $this->belongsToMany('App\Models\Management\User');
    }
    
    public function adminlevel() {
        return $this->hasOne('App\Models\Management\Lists', 'id', 'adminlevel_id');
    }

    public function permissions(){
        return Permission::join('permission_role', 'permission_role.permission_id', 'permissions.id')
                ->where('permission_role.role_id', $this->id)->get();
    }

    public function modules(){
        return Module::join('role_module', 'role_module.module_id', 'modules.id')
                ->where('role_module.role_id', $this->id)
                ->where('modules.typelabel_id', '52')->get();
    }

    public static function searchFullText($q, $pages) {
        return Role::select(DB::raw("id, display_name, description"))
                ->whereRaw("MATCH(display_name, description) AGAINST('+" . $q . "*' in boolean mode)")
                ->where("company_id", auth()->user()->company_id)
                ->get();
    }
}
