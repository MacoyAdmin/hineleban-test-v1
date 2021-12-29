<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    function index(Request $req)
    {
      if ($req->file('file') != null) 
      {
        return $req->file('file')->store('user');
      }
     
    }
}
