<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class TransactionsPaymentmethods extends Model
{
    public function FormaPago(){
        return $this->hasOne('App\Models\Management\Lists', 'id', 'paymentmethods_id');
    }
}
