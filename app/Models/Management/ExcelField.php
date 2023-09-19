<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;
use const App\Http\Controllers\Bulk\SCHEMA;

class ExcelField extends Model
{
    public $table = "excel_field";
    public $timestamps = false;

    public function scopeColumns($query, $nameTable)
    {
        return $query->where('name_table', $nameTable)->where('status', 1);
    }
}
