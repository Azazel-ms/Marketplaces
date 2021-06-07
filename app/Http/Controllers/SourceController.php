<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SourceController extends Controller
{
    
	public function itemSources()
	{
		$source = $this->searchEan('5050689852884');
		dd($source->body->data);
	}

	public function searchEan($ean)
	{
		$uri = 'http://live.icecat.biz/api/?UserName=alekzleon&Language=en&GTIN=' . $ean;
		$response = $this->curl($uri);

		return $response;
	}

	public function curl($url = null)
	{
		$curl_options = [
			CURLOPT_HTTPHEADER => array('x-format-new:true'),
	        CURLOPT_USERAGENT => "MELI-PHP-SDK-1.0.0", 
	        CURLOPT_MAXCONNECTS => 900 ,
	        CURLOPT_SSL_VERIFYPEER => false,
	        CURLOPT_CONNECTTIMEOUT => 0, 
	        CURLOPT_RETURNTRANSFER => 1, 
	        CURLOPT_TIMEOUT => 0,
		];

		$ch = curl_init($url);
		curl_setopt_array($ch, $curl_options);
		$return = new \stdClass();		
		$return->body = json_decode(curl_exec($ch), false);
		$return->httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		return $return;
	}

}
