<?php

namespace App\Models\Management;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission {

    public function roles() {
        return $this->belongsToMany('App\Models\Management\Role');
    }

}
