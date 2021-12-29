<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customertbls;
use Illuminate\Support\Facades\DB;

class userRegistration extends Controller
{
    //
    function addUser(Request $req)
    {
        $customer = new customertbls;
        $customer->FirstName=$req->firstname;
        $customer->LastName=$req->lastname;
        $customer->EmailAddress=$req->email;
        $customer->Password=$req->password;
        $customer->ContactNo=$req->contactno;
        $customer->save();

        $query =  DB::select('select * from customertbls order by customerid desc')[0];
        if($query->FirstName != '')
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
        }
        return redirect('users');
    }
}
