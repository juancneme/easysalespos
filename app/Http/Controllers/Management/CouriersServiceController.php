<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Management\Courier;
use App\Models\Management\Deliveries;
use App\Models\Management\Vehicle;

class CouriersServiceController extends Controller{

    public function getCouriers(){
        $couriers=Courier::all();
        return response()->json($couriers);
    }

    public function getCourierData($id){
        $courier=Courier::where('id',$id)
            ->with('person','company','vehicle')
            ->first();

        $deliveries = Deliveries::where('courier_id',$id)
            ->with('courier','transaction','address')
            ->get();


        $response['courier'] = [
          'id'=> $id,
          'fullname'=> $courier->person->fullname,
          'phone'=> $courier->person->contactphone[0]['textcontact'],
          'email'=>$courier->person->contactemail[0]['textcontact'],
          'vehicle' => [
              'id' => $courier->vehicle_id,
              'type'=> $courier->vehicle->type->name,
              'register'=> $courier->vehicle->register
          ]
        ];


        //$response['deliveries'] = [
         //   'id' => $deliveries
        //];



        return response()->json($response);
    }

}
