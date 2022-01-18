<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\inventorytbl;

class manageStock extends Controller
{   //
    function getStocks(){
        $stocks =  DB::select('select * from inventorytbls group by productid,Unit');
        //session()->put('productInfo', $products);
    
        return  view('admin/managestock',['stocks'=> $stocks]);
    }
    function getInventory(){
        $inventory =  DB::select('select * from inventorytbls');
        //session()->put('productInfo', $products);
    
        return  view('admin/inventory',['inventory'=> $inventory]);
    }
    function viewStocks($id){
        $stocks =  DB::select('select * from inventorytbls where productid="'.$id.'"');
       
        return  view('admin/stocksViewer',['stocks'=> $stocks]);
    }
    function updateStocks($id)
    {
        
        $data = inventorytbl::find($id);
        return view('admin/editstocks',['data'=>$data]); 
    }
    function updateStock($id)
    {
        
        $data = inventorytbl::find($id);
        return view('admin/editStock',['data'=>$data]); 
    }
    function submitUpdateStock(Request $req)
    {
        $data = inventorytbl::find($req->id);
        $data->Quantity=$req->quantity;
        $data->unit=$req->unit;
        $data->unit_type=$req->unit_type;
        $data->BatchCode=$req->batch;
        $data->ReceivedDate=$req->date_received;
        $data->save();
        return redirect('admin/managestock');
    }
}