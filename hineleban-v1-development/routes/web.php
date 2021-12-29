<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userLogin;
use App\Http\Controllers\adminLogin;
use App\Http\Controllers\userRegistration;
use App\Http\Controllers\productController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\rolesController;
use App\Http\Controllers\manageUserController;
use App\Http\Controllers\manageStock;
use App\Http\Controllers\managejobOrder;
use App\Http\Controllers\cartController;
use App\Http\Controllers\addtocartController;
use App\Http\Controllers\transactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect('home');
});

Route::get('/about', function(){
    return view('about');
});

Route::get('/contact', function(){
    return view('contact');
});
Route::get('/admin ', function(){
    return view('admin');
});
Route::get('/store', function(){
    return view('store');
});
Route::get('/tac', function(){
    return view('tac');
});
Route::get('/login', function(){
    return view('login');
});
Route::get('/faq', function(){
    return view('faq');
});
Route::get('/product', function(){
    return view('product');
});
Route::get('/invoice', function(){
    return view('invoice');
});
Route::get('/orders', function(){
    return view('orders');
});
Route::get('/orderhistory', function(){
    return view('orderhistory');
});
Route::get('/register', function(){
    return view('register');
});
Route::view("invoice","invoice");
Route::view("product","product");
Route::get('/clientcart', function(){
    return view('clientcart');
});
Route::get('/users', function(){
    return view('users');
});
Route::get('/admin/dashboard', function(){
    return view('/admin/dashboard');
});
Route::get('/admin/adduser', function(){
    return view('/admin/adduser');
});
Route::get('/admin/manageuser', function(){
    return view('/admin/manageuser');
});
Route::get('/admin/addproduct', function(){
    return view('/admin/addproduct');
});
Route::get('/admin/manageproduct', function(){
    return view('/admin/manageproduct');
});
Route::get('/admin/addstock', function(){
    return view('/admin/addstock');
});
Route::get('/admin/managestock', function(){
    return view('/admin/managestock');
});
Route::get('/admin/manageorder', function(){
    return view('/admin/manageorder');
});
Route::get('/admin/login', function(){
    return view('/admin/login');
});
Route::get('/admin/inventory', function(){
    return view('/admin/inventory');
});
Route::post("admin/dashboard", [adminLogin::class,'getData']);
Route::view("admin/login","admin/login");

Route::post("users", [userLogin::class,'getData']);
Route::view("login","login");

Route::post("product", [addtocartController::class,'addtocart']);
Route::post("adduser", [adduser::class,'adduser']);

Route::post("register", [userRegistration::class,'addUser']);

Route::post("clientcart", [transactionController::class,'addtotransaction']);
Route::post("upload", [UploadController::class,'index']);

Route::get("store", [ProductController::class,'GetProducts']);
Route::get("admin/manageproduct", [ProductController::class,'GetProductsStockManage']);
Route::get("admin/managestock", [manageStock::class,'getStocks']);
Route::get("admin/inventory", [manageStock::class,'getInventory']);
Route::get("admin/manageorder", [managejobOrder::class,'getJO']);
Route::get("admin/addstock", [ProductController::class,'GetProductsStock']);
Route::get("admin/adduser", [rolesController::class,'GetRoles']);
Route::get("admin/manageuser", [manageUserController::class,'GetUser']);
Route::get("product", [ProductController::class,'getItem']);
Route::get("clientcart", [cartController::class,'getCart']);
Route::get("invoice", [cartController::class,'getCartInvoice']);
Route::get("orders", [cartController::class,'getTransaction']);
Route::get("orderhistory", [cartController::class,'getTransactionHistory']);

Route::get('/logout', function () {
    if(session()->has('firstname'))
    {
        session()->pull('firstname');
        session()->pull('lastname');
        session()->pull('emailaddress');
        session()->pull('contactno');
        session()->pull('cart');
        session()->pull('city');
        session()->pull('street');
        session()->pull('brgy');
        session()->pull('zip');
        session()->pull('province');
    }
    return redirect('/home');
});