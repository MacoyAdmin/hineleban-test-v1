<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class cartController extends Controller
{
    //
    function getCart(Request $req)
    {
        
        $cart =  DB::select('select * from carts');
        //session()->put('productInfo', $products);
        $req->session()->put('cart',count($cart));
        return  view('clientcart',['cart'=> $cart]);
   
    }
    function getCartInvoice(Request $req)
    {
        
        $cart =  DB::select('select * from carts');
        //session()->put('productInfo', $products);
        $req->session()->put('cart',count($cart));
        return  view('invoice',['cart'=> $cart]);
   
    }
    function getTransaction(Request $req)
    {
        
        $transaction =  DB::select('select * from transactiontbls');
        //session()->put('productInfo', $products);
        return  view('orders',['transaction'=> $transaction]);
   
    }
    function getTransactionHistory(Request $req)
    {
        
        $transaction =  DB::select('select * from transactiontbls');
        //session()->put('productInfo', $products);
        return  view('orderhistory',['transaction'=> $transaction]);
   
    }
}
