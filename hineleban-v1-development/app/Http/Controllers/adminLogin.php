<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminLogin extends Controller
{
    //
    function getData(Request $req)
    {
        
        $data=$req->input();  
        $query =  DB::select('select * from usertbl where emailaddress="'.$data['emailaddress'].'" and password="'.$data['password'].'"')[0];
        if($query->EmailAddress == $data['emailaddress'] && $query->Password == $data['password'])
        {
        $req->session()->put('firstname',$query->FirstName);
        $req->session()->put('lastname',$query->LastName);

        //$req->session()->put('userPass',$data['userPass']);
        }else{
            return $data;
        }
        
        return redirect('admin/dashboard');
   
    }
}
