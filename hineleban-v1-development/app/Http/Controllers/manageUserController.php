<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class manageUserController extends Controller
{
    //
    function GetUser()
    {
        
        $users =  DB::select('select * from usertbl');
        //session()->put('productInfo', $products);
    
        return  view('admin/manageuser',['users'=> $users]);
   
    }
}
