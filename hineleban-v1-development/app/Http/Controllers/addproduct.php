<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productstbl;

class addproduct extends Controller
{
    //
    function addProduct(Request $req)
    {
        $prod = new productstbl;
        $prod->ProductName=$req->productname;
        $prod->ProductDes=$req->productdes;
        $prod->Category=$req->category;
        $prod->Unit=$req->unit;
        $prod->Price=$req->price;
        $prod->MfgDate=$req->mfgdate;
        $prod->Expiration=$req->expdate;
        $prod->IsFeatured=$req->IsFeatured;
        if($req->file != '' || $req->file != null)
        {
            $file = $req->file('file')->store('user');
            $prod->ResourcePath=$file;
        }
        $prod->save();
        return redirect('admin/manageproduct');
    }
}
