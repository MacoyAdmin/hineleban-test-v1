<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class manageStock extends Controller
{
    //
    function getStocks(){
        $stocks =  DB::select('select * from inventorytbls group by productid');
        //session()->put('productInfo', $products);
    
        return  view('admin/managestock',['stocks'=> $stocks]);
    }
    function getInventory(){
        $inventory =  DB::select('select * from inventorytbls');
        //session()->put('productInfo', $products);
    
        return  view('admin/inventory',['inventory'=> $inventory]);
    }
  
}
