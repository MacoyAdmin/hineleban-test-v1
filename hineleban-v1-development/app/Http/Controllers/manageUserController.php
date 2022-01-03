<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\usertbl;

class manageUserController extends Controller
{
    //
    function GetUser()
    {
        
        $users =  DB::select('select * from usertbls');
        //session()->put('productInfo', $products);
    
        return  view('admin/manageuser',['users'=> $users]);
   
    }
    function updateData($id)
    {
        
        $data = usertbl::find($id);
        return view('admin/edituser',['data'=>$data]); 
    }
    function submitUpdate(Request $req)
    {
        $data = usertbl::find($req->id);
        $data->FirstName=$req->firstname;
        $data->LastName=$req->lastname;
        $data->UserName=$req->username;
        $data->Password=$req->password;
        $data->EmailAddress=$req->email;
        $data->Active=$req->active;
        $data->save();

        return redirect('admin/manageuser');
    }
}
