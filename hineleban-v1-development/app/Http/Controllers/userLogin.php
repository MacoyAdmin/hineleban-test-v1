<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class userLogin extends Controller
{
    function getData(Request $req)
    {
        
        $data=$req->input();  
        $query =  DB::select('select * from customertbls where emailaddress="'.$data['emailaddress'].'" and password="'.$data['password'].'"')[0];
        if($query->EmailAddress == $data['emailaddress'] && $query->Password == $data['password'])
        {
        $req->session()->put('firstname',$query->FirstName);
        $req->session()->put('lastname',$query->LastName);
        $req->session()->put('customerId',$query->CustomerId);
        $req->session()->put('contactno',$query->ContactNo);
        $req->session()->put('emailaddress',$query->EmailAddress);
        $req->session()->put('street',$query->streetaddress);
        $req->session()->put('brgy',$query->brgy);
        $req->session()->put('city',$query->city);
        $req->session()->put('province',$query->province);
        $req->session()->put('zip',$query->zip);
        $req->session()->put('resourcepath',$query->resourcepath);
        //$req->session()->put('userPass',$data['userPass']);
        }else{
            return $data;
        }
        
        return redirect('/');
   
    }
}