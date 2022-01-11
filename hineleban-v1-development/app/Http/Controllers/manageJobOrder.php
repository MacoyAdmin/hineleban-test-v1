<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class manageJobOrder extends Controller
{
    function getJO(){
        $jo =  DB::select('select * from transactiontbls');
        //session()->put('productInfo', $products);
    
        return  view('admin/manageorder',['jo'=> $jo]);
    }
    //
}
