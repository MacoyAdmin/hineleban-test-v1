<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\transactiontbl;
use App\Models\inventorytbl;
use App\Models\cart;

class manageJobOrder extends Controller
{
    function getJO(){
        $jo =  DB::select('select * from transactiontbls');
        //session()->put('productInfo', $products);
    
        return  view('admin/manageorder',['jo'=> $jo]);
    }
    function rejectOrder($id)
    {
        
        $data = transactiontbl::find($id);
        $data->jobstatusid=5;
        $data->save();
        return redirect('admin/manageorder');
    }
    function submitUpdatetransaction(Request $req)
    {
        $data = transactiontbl::find($req->tid);
         $data->mop=$req->mop;
        $data->transfer=$req->mot;
         $data->jobstatusid=$req->jobstat;
         if($req->jobstat == 5)
         {
            $inv = inventorytbl::find(2);
            $inv->Quantity=$inv->Quantity - 1;
            $inv->save();
         }
        $data->customerid=$req->customerid;

         $data->save();
         return redirect('admin/manageorder');
       
    }
    function updateOrders($id)
    {
        
        $data = transactiontbl::find($id);
        return view('admin/orderUpdate',['data'=>$data]); 
       //redirect('admin/manageorder');
    }
    
    function viewOrder($id)
    {
        $job =  DB::select('select * from carts where transactionid="'.$id.'"');
        return  view('admin/vieworder',['job'=> $job]);
        // $data = transactiontbl::find($id);
        // $data->jobstatusid=5;
        // $data->save();
        // return redirect('admin/manageorder');
        //return $id;
    }
    //
}
