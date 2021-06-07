<?php

namespace App\Http\Controllers;

use App\Models\SourceProviders;
use Illuminate\Http\Request;

class ProvidersController extends Controller
{
    public function registerprovider(request $request) {
        $providers = SourceProviders::all();
        
        $request;
        return redirect('providers');
    }
}
