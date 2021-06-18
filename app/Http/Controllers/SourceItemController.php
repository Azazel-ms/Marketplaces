<?php

namespace App\Http\Controllers;

use App\Models\SourceFields;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\SourceItems;
use App\Models\SourceProviders;
use Validator;
use Illuminate\Support\Facades\View;

class SourceItemController extends Controller
{

	public function __construct()
	{
		
	}

	public function index(Request $request)
	{		
		$data = SourceItems::Item($request->search)->get();		
		return view("sources.items.index")->with('data',$data)->with(['title' => 'Buscar item']);
	}	

	public function create(Request $request)
	{		
		/* $validate = $this->validate($request,[
            'barcode' => 'required|max:13|min:12',            
			]
		); */

		if (SourceItems::where('ean', '=',$request->barcode)->exists()) {
			\Toastr::error('Este registro ya se encuentra en la base de datos','Items');
			return redirect()->route('source.item.index');
		}		

		$response = $this->curl('http://live.icecat.biz/api/?UserName=alekzleon&Language=en&GTIN='.$request->barcode);


		if ($response->httpCode == 200) {
			$json=$response->body->data->GeneralInfo;
			$json = json_encode($json);
			$json = json_decode($json, true);
			//$json = array_keys($json);

			//$fields = new SourceFields();
			//$v = count($json);
			//$myArray = $json;
		    //$arrayKeys = recursive1($myArray);
			
			/* for ($i = 0; $i < $p  ;$i++){
				$fields->source_provider_id = "1";
				$fields->name = $json[$i];
				$fields->data_type = "text";
				$fields->data_long = "500" ;
				$fields->description = "null" ;
				$fields->save();	
			} */	
	
			$item = new SourceItems();
			$item->source_providers_id='1';
			$item->json = json_encode($json);
			$item->ean = $request->barcode;
			$item->save();

			\Toastr::success('Registro guardado exitosamente','Items');
			return redirect()->route('source.item.index');
		}

		\Toastr::warning('Registro no encontrado en Icecat','Items');
			return redirect()->route('source.item.index');

	}	

	public function update()
	{
		
	}

	public function delete()
	{
		
	}

	function curl($url = null)
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
