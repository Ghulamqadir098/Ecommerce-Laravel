<?php

namespace App\Http\Controllers;

use Stripe;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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


// -----------------------------------------------------------Cart Logic -------------------------------------------------------- 

    public function add_cart(Request $request,$id){

if(Auth::id())
{
$user=Auth::user();
$product=Product::find($id);

$cart=new Cart;
$cart->user_id=$user->id;
$cart->name=$user->name;
$cart->email=$user->email;
$cart->phone=$user->phone_no;
$cart->product_id=$product->id;
$cart->product_title=$product->title;

if($request->cart_quantity > $product->quantity){
    $notification1 = array(
        'message' => 'Order Quantity is more than Our available stock for this item',
         'alert-type' =>'error'
     );
   return redirect()->back()->with($notification1);

}


if($product->discount_price != null){
    $cart->price=$product->discount_price * $request->cart_quantity;
}
else{
    $cart->price=$product->price * $request->cart_quantity;
}

$cart->image=$product->image;
$cart->address=$user->address;

$cart->quantity=$request->cart_quantity;

$cart->save();
$notification = array(
    'message' => 'Product added successfully',
     'alert-type' =>'success'
 );

 return redirect()->route('/')->with($notification);

}
else{

    return redirect('login');
}

    }

public function view_cart(){

$id = Auth::user()->id;
$cart=Cart::where('user_id','=',$id)->get();


if($cart->isEmpty()){
return redirect('/');

}
else{
    return view('home.pages.cart',compact('cart'));
}

}

public function remove_item($id){

$cart=Cart::find($id);

$cart->delete();

$notification = array(
    'message' => 'Item removed successfully',
     'alert-type' =>'success'
 );
 return redirect()->back()->with($notification);

}


//-----------------------------------------------------Payments logic-----------------------------------------------------------------


public function cash_order(){

$user=Auth::user();

$user_id=$user->id;

$data= Cart::where('user_id','=',$user_id)->get();

foreach($data as $data){

$order=new Order;
$order->name=$data->name;
$order->email=$data->email;
$order->phone=$data->phone;
$order->address=$data->address;
$order->user_id=$data->user_id;
$order->product_title=$data->product_title;
$order->quantity=$data->quantity;
$order->price=$data->price;
$order->image=$data->image;
$order->product_id=$data->product_id;
$product=Product::find($data->product_id);
$product->quantity=$product->quantity - $data->quantity;
$product->save();
$order->payment_status='cash on delivery';
$order->delivery_status='processing';
$order->save();
$data->delete();

}


$notification = array(
    'message' => 'Order has been Placed successfully',
     'alert-type' =>'success'
 );
return redirect()->route('/')->with($notification);

}


public function stripe($total){

return view('admin.pages.stripe',compact('total'));

}


public function stripePost(Request $request,$total)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $total*100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for Payment" 
        ]);
      
        Session::flash('success', 'Payment successful!');
              
$user_id=Auth::user()->id;
$data= Cart::where('user_id','=',$user_id)->get();

foreach($data as $data){

  
$order=new Order;
$order->name=$data->name;
$order->email=$data->email;
$order->phone=$data->phone;
$order->address=$data->address;
$order->user_id=$data->user_id;
$order->product_title=$data->product_title;
$order->quantity=$data->quantity;
$order->price=$data->price;
$order->image=$data->image;
$order->product_id=$data->product_id;
$product=Product::find($data->product_id);
$product->quantity=$product->quantity - $data->quantity;
$product->save();
$order->payment_status='cash Paid in Full';
$order->delivery_status='processing';
$order->save();
$data->delete();
}


$notification = array(
    'message' => 'Amount Paid in Full',
     'alert-type' =>'success'
 );

        return redirect()->route('/')->with($notification);

                                    // CArd Details
//  Name: Test

// Number: 4242 4242 4242 4242

// CSV: 123

// Expiration Month: 12

// Expiration Year: 2028


    }
}
