<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class rolesController extends Controller
{
    //
    function GetRoles()
    {
        
        $roles =  DB::select('select * from rolestbl');
        //session()->put('productInfo', $products);
    
        return  view('admin/adduser',['roles'=> $roles]);
   
    }
}
