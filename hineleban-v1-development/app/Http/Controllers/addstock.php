<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inventorytbl;

class addstock extends Controller
{
     //
     function addStock(Request $req)
     {
         $stock = new inventorytbl;
         $stock->ProductId=$req->productid;
         $stock->unit=$req->unit;
         $stock->unit_type=$req->unit_type;
         $stock->Quantity=$req->quantity;
         $stock->BatchCode=$req->batch;
         $stock->ReceivedDate=$req->date_received;
         $stock->save();

         return redirect('admin/managestock');
     }
}
