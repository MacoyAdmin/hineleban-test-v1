<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transactiontbl;
use Illuminate\Support\Facades\DB;

class transactionController extends Controller
{
    //
    function addtotransaction(Request $req)
    {     
        $transaction = new transactiontbl;
        $transaction->mop=$req->mop;
        $transaction->transfer=$req->transfer;
        $transaction->jobstatusid=1;
        $transaction->totalPrice=$req->totalPrice;
        $transaction->customerid=$req->customerId;
        $transaction->save();

        $query =  DB::select('select * from transactiontbls order by transactionid desc')[0];
        if($query->transactionid != '')
        {
            $req->session()->put('transactionid',$query->transactionid);
        }
        return redirect('/invoice');
    }
}
