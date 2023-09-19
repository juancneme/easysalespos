<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class ShiftClosure extends Model
{
    public $table = "shift_closure";

    public function paymethods()
    {
        return $this->hasOne(Lists::class,'id','medium_payment_type');
    }

}
