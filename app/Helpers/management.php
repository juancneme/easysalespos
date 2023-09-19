<?php

function login() {
    
}

function saveUser($obj) {
    if ($obj->id > 0) {
        $user = User::where('id', '=', $obj->id)->first();
        if ($obj->password != "" && bcrypt($obj->password) != $user->password) {
            $user->password = bcrypt($obj->password);
        }
    } else {

        $ema = User::where('email', '=', $obj->email)->first();
        if (!empty($ema->id)) {
            return array("errors" => __("Email already exists"));
        }
        $user = new User ();
        $user->password = bcrypt($obj->password);
    }

    try {

        $user->name = $obj->name;
        $user->email = $obj->email;
        $user->status = $obj->status;
        $user->save();

        $user->detachRoles(Role::get());
        $user->save();
        $user->attachRoles($obj->roles);
        $user->save();

        return array("success" => __("Success"));
    } catch (Exception $e) {
        return array("errors" => __("User can't be saved. Please review data and try again later"));
    }
}
