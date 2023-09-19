<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Retroalimentarte\Csi;

class NotificationController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $results = array();

        $csi = Csi::where("user_id", "=", auth()->user()->id)
                ->where("status", "=", "1")
                ->get();
        
        if(!empty($csi)){
            $results["csi"] = array();
            
            foreach($csi as $c){
                $results["csi"][] = $c;
            }
        }

        return json_encode($results);
    }

}
