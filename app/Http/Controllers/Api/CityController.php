<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function list(){
        $cities = City::orderBy('name', 'asc')->get();
         
        $list = [];

        foreach ($cities as $city) {
            $objet = [
                'id' => $city->id,
                'name' => $city->name,
                'state' => $city->state,
                'is_capital' => $city->is_capital,
            ];
            array_push($list, $objet);
        }
        return response()->json($list);
    }

    public function create (Request $request){
        
        $data = $request->validate([
            'name' => 'required|',
            'state_id' => 'required|numeric',
            'isCapital' => 'nulable|numeric',
        ]);

        if($data['isCapital'] >0){
            $city = City::create([
                'name' => $data['name'],
                'state_id' => $data['state_id'],
                'isCapital' => $data['siCapital'],
            ]);

        } else {
            $city = City::create([
                'name' => $data['name'],
                'state_id' => $data['state_id'],
            ]);
        }

        if ($city){

            $response = [
                'response' => 1,
                'message' => 'City created successfully',
                'city' => $city
            ];

            return response()->json($response);
        } else {
            $response =[
            'response' => 0,
            'message' => 'There was an error saving data'
            ];
        }
    }
}
