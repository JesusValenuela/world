<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function list(){
        $countries = Country::orderBy('name', 'asc')->get();
         
        $list = [];

            foreach ($countries as $country) {
            $object = [
                'id' => $country->id,
                'name' => $country->name,
                'continent' => $this->getContinentName($country),
                'population' => $country->population,
                'lenguage' => $country->lenguage,
                'currency' => $country->curency,
            ];
            array_push($list, $object);
        }

        return response()->json($list);
    }

    public function item(){

    }

    public function getContinentName ($conutry) {
        $countries = Country::orderBy('name', 'asc')->get();
        
        foreach ($countries as $conutry) {

            switch ($conutry->contient){
                case 1:
                    $continent_name = "África";
                    break;
                case 2:
                    $continent_name = "Antartida";
                    break;
                case 3:
                    $continent_name = "Norteamérica";
                    break;
                case 4:
                    $continent_name = "Sudamérica";
                    break;
                case 5:
                    $continent_name = "Asía";
                    break;
                case 6:
                    $continent_name = "Europa";
                    break;
                case 7:
                    $continent_name = "Oceanía";
                    break;
                case 8:
                    $continent_name = "No valido";
                    break;
            }

            return $continent_name;
        }
    }
}
