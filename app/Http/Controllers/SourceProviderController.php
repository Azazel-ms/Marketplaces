<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SourceProviders;
use App\Models\SourceItems;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
class SourceProviderController extends Controller
{
    public function __construct()
	{
		
	}

	public function index(Request $request)
	{				
		$data = SourceProviders::Provider($request->search)->paginate(25);		
		return view("sources.providers.index")->with(['data' => $data]);
	}	

	public function create(Request $request)
	{
		#validación
		$validate = $this->validate($request,[
            'short_name' => 'required|max:5|min:3',
            'name' => 'unique:App\Models\SourceProviders|required|max:50',
			]
		);

        $list = new SourceProviders($request->all());
		$list -> short_name = $request->short_name;
		$list -> name = $request->name;
		$list -> save();
		\Toastr::success('Registro guardado correctamente','Proveedores');
		return redirect()->route('source.provider.index');
	}


	public function update(Request $request, $id)
	{
			$validate = $this->validate($request,[
				'short_name' => 'required|max:5|min:3',
				'name' => 'required|unique:App\Models\SourceProviders,name,'. $id . ',id'
				]
			);		
		SourceProviders::where('id','=',$id)->update(['name' => $request->name, 'short_name' => $request->short_name]);
		\Toastr::success('Se modificó correctamente','Proveedores');
		return Redirect::back();
	}

	public function delete($id)
	{
		if(SourceProviders::find($id) == true){
			SourceProviders::where('id','=',$id)->delete();
			\Toastr::success('Se elimino correctamente','Proveedores');
		}else{
			\Toastr::error('No se encontro el dato','Proveedores');
		};

		return Redirect::back();
	}
}
