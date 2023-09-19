<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class Deliveries extends Model
{
    public $table = "deliveries";

    public function courier(){
        return $this->hasOne(Courier::class, 'id', 'courier_id');
    }

    public function transaction(){
        return $this->hasOne(Transactions::class, 'id', 'transaction_id');
    }

    public function status(){
        return $this->hasOne(Lists::class, 'id', 'status');
    }

    public function address(){
        return $this->hasOne(Address::class, 'id', 'address_id');
    }

    public function couriercompany(){
        return $this->hasOne(Lists::class, 'id', 'companycourier_id');
    }

}

