<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\Management\Transactions;

class ViewPDFController extends Controller
{
    public function __construct() {
        // $this->middleware('auth');
    }

    public function index($id) {
        
        $transaction = Transactions::find($id);

        $contract = $transaction->contract_id;
        $company = $transaction->company_id;
        $fecha = substr(str_replace("-", "", $transaction->operation_date),0,8);

        $folder0 = str_pad($contract, 5, "0", STR_PAD_LEFT)."/".str_pad($company, 5, "0", STR_PAD_LEFT);
        $folder1 = $fecha;
        $filename = "TK".str_pad($id, 6, "0", STR_PAD_LEFT).".txt";

        $filePath = "/tiketsPDVi/".$folder0."/".$folder1;
        $file = $filePath."/".$filename;
        
        $exists = Storage::has($file);

        if ($exists) {
            $data = Storage::get($file);

            dd("cargo la data ",$data);
            
            // return Response::make(Storage::get($file), 200, [
            //     'Content-Type' => 'application/pdf',
            //     'Content-Disposition' => 'attachment; filename="'.$filename.'"'
            // ]);
        } else {
            return back()->with('errors', array(__("TXT file does not exist")));
        }
    }

}
