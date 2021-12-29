<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;

class addtocartController extends Controller
{
    //
    function addtocart(Request $req)
    {     
        $cart = new cart;
        $cart->ProductId=$req->ProductId;
        $cart->Quantity=$req->Quantity;
        $cart->Price=($req->Price * $req->Quantity);
        $cart->customerId=$req->customerId;
        $cart->save();
        return redirect('/store');
    }
}
