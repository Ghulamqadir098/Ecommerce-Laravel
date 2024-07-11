<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

public function index(){
$products=Product::all();


return view('home.pages.home',compact('products'));
}

    public function redirect(){
     $user_type=Auth::user()->user_type;

     if($user_type==1){

      return view('admin.pages.home');
     }
    else{

return redirect('/');

    }

    
    
    }
}
