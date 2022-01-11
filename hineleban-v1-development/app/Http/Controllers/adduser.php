<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usertbl;
class adduser extends Controller
{
    //
    function adduser(Request $req)
    {     
        $user = new usertbl;
        $user->UserName=$req->username;
        $user->EmailAddress=$req->email;
        $user->UserRole=$req->role;
        $user->FirstName=$req->firstname;
        $user->LastName=$req->lastname;
        $user->Password=$req->password;
 
        if($req->file != '' || $req->file != null)
        {
            $file = $req->file('file')->store('user');
            $user->resourcepath=$file;
        }
        $user->save();
        return redirect('admin/manageuser');
    }
}
