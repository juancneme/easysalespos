<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    public function Contrato(){
        return $this->hasOne('App\Models\Management\Contract', 'id', 'contract_id');
    }

    public function Comercio(){
        return $this->hasOne('App\Models\Management\Company', 'id', 'company_id');
    }

    public function Catalogo(){
        return $this->hasOne('App\Models\Management\Catalog', 'id', 'catalog_id');
    }

    public function User(){
        return $this->hasOne('App\Models\Management\User', 'id', 'user_id');
    }

    public function Seller(){
        return $this->hasOne('App\Models\Management\User', 'id', 'seller_id');
    }

    public function Proveedor(){
        return $this->hasOne('App\Models\Management\Supplier', 'id', 'supplier_id');
    }

    public function Estado(){
        return $this->hasOne('App\Models\Management\Lists', 'id', 'status');
    }

    public function Cliente(){
        return $this->hasOne('App\Models\Management\Client', 'id', 'client_id');
    }

    public function typeOperation(){
        return $this->hasOne('App\Models\Management\Lists', 'id', 'typeoperation_id');
    }

    public function delivery()
    {
        return $this->hasOne('App\Models\Management\Deliveries', 'id', 'transaction_id');
    }

}
