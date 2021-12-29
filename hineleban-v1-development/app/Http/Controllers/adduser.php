<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usertbl;
class adduser extends Controller
{
    //
    function adduser(Request $req)
    {     
        $user = new usertbl;
        //$cart->ProductId=$req->ProductId;
 
        //$cart->save();
        return $req;
    }
}
