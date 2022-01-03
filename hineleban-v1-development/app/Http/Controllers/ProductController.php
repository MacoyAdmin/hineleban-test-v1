<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function GetProducts()
    {
        
        $products =  DB::select('select * from productstbl');
        //session()->put('productInfo', $products);
    
        return  view('store',['products'=> $products]);
   
    }
    function GetProductsStock()
    {
        
        $products =  DB::select('select * from productstbl');
        //session()->put('productInfo', $products);
    
        return  view('admin/addstock',['products'=> $products]);
   
    }
    function GetProductsStockManage()
    {
        
        $products =  DB::select('select * from productstbl');
        //session()->put('productInfo', $products);
    
        return  view('admin/manageproduct',['products'=> $products]);
   
    }
    function GetProductsStockDashboard()
    {
        
        $products =  DB::select('select * from productstbl');
        //session()->put('productInfo', $products);
    
        return  view('admin/dashboard',['products'=> $products]);
   
    }
    function getItem(Request $req)
    {
        $products =  DB::select('select * from productstbl where productid="'.$req->id.'"');
        //session()->put('productInfo', $products);
        //return  redirect('product');
        return  view('product',['products'=> $products]);
    }
    function GetProductsWelcome()
    {
        
        $products =  DB::select('select * from productstbl where isfeatured=1 order by productid desc limit 4');
        //session()->put('productInfo', $products);
    
        return  view('welcome',['products'=> $products]);
   
    }
}
