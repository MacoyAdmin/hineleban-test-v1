<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\usertbl;
use App\Models\productstbl;

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
    function updateProduct($id)
    {
        
        $data = productstbl::find($id);
        return view('admin/editproduct',['data'=>$data]); 
    }
    function disableProduct($id)
    {
        
        $data = productstbl::find($id);
        $data->Active=0;
        $data->save();
        return redirect('admin/manageproduct');
        return $id;
    }
    function enableProduct($id)
    {
        
        $data = productstbl::find($id);
        $data->Active=1;
        $data->save();
        return redirect('admin/manageproduct');
        return $id;
    }
    function featureProduct($id)
    {
        
        $data = productstbl::find($id);
        $data->isFeatured=1;
        $data->save();
        return redirect('admin/manageproduct');
        return $id;
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
        if($req->file != '' || $req->file != null)
        {
            $file = $req->file('file')->store('user');
            $data->resourcepath=$file;
        }
        $data->save();
        return redirect('admin/manageuser');
    }
}
