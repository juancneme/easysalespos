<?php

namespace App\Http\Controllers\Bulk;

use App\Models\Management\ExcelField;
use App\Models\Sir\Xml\Schema;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

const SCHEMA = 'easysalespos';

class DownloadFileController extends Controller
{
    public function __construct(Request $request){}

    public function dowload(Request $request)
    {
        //$columns = ExcelField::columns(10)->value('id');
        dd("en el controller ",$request);
        $excel = new CreateExcelController('catalog_products',$request);

        return $excel->createExcel($request);
    }

}
