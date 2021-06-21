<?php

namespace App\Http\Controllers;

use App\Models\SourceItems;
use Illuminate\Support\Facades\View;

class SourceFieldsController extends Controller
{
    function view(){

    }
    function index(){
        //$json = SourceItems::find("1");
        //dd($json);
        return view ("sources.fields.index");
    } 
}