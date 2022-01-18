<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\transactiontbl;

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
    //
}
