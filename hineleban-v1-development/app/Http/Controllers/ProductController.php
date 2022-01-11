<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\productstbl;

class ProductController extends Controller
{
    function GetProducts()
    {
        
        $products =  DB::select('select * from productstbls where active = 1');
        //session()->put('productInfo', $products);
    
        return  view('store',['products'=> $products]);
   
    }
    function GetProductsStock()
    {
        
        $products =  DB::select('select * from productstbls');
        //session()->put('productInfo', $products);
    
        return  view('admin/addstock',['products'=> $products]);
   
    }
    function GetProductsStockManage()
    {
        
        $products =  DB::select('select * from productstbls');
        //session()->put('productInfo', $products);
    
        return  view('admin/manageproduct',['products'=> $products]);
   
    }
    function GetProductsStockDashboard()
    {
        
        $products =  DB::select('select * from productstbls');
        //session()->put('productInfo', $products);
    
        return  view('admin/dashboard',['products'=> $products]);
   
    }
    function getItem(Request $req)
    {
        $products =  DB::select('select * from productstbls where productid="'.$req->id.'"');
        //session()->put('productInfo', $products);
        //return  redirect('product');
        return  view('product',['products'=> $products]);
    }
    function GetProductsWelcome()
    {
        
        $products =  DB::select('select * from productstbls where isfeatured=1 and active = 1 order by productid desc limit 4');
        //session()->put('productInfo', $products);
    
        return  view('welcome',['products'=> $products]);
   
    }
    function submitUpdate(Request $req)
    {
        $data = productstbl::find($req->id);
        $data->ProductName=$req->productname;
        $data->ProductDes=$req->productdes;
        $data->Category=$req->category;
        $data->Unit=$req->unit;
        $data->Price=$req->price;
        $data->MfgDate=$req->mfgdate;
        $data->Expiration=$req->expdate;
        $data->IsFeatured=$req->IsFeatured;
        if($req->file != '' || $req->file != null)
        {
            $file = $req->file('file')->store('user');
            $data->ResourcePath=$file;
        }
        $data->save();
        return redirect('admin/manageproduct');
    }
}
