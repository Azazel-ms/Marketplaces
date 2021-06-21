<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MarketPlacesController extends Controller
{
    public function index(){
        return view("sources.marketplace.index");
    }
    public function createfields(){
        dd($this->curl());
        return Redirect::back();
    }
    public function Curl(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://coppel.mirakl.net/api/hierarchies',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: fe8faf4f-820e-44ed-8e0a-f19ac387cac0'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}
