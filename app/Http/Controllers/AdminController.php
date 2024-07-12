<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_categories()
    {

        $category = Category::all();

        return view('admin.pages.category', compact('category'));
    
    
    }
    public function add_category(Request $request)
    {
        $category_name = $request->category_name;
        $category = new Category;
        $category->category_name = $category_name;
        $category->save();

        $notification = array(
            'message' => 'Category added successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
public function category_delete($id){

$category= Category::find($id);

$category->delete();

$notification = array(
    'message' => 'Category Deleted successfully',
    'alert-type' => 'error'
);

return redirect()->back()->with($notification);

}



// ----------------------------------------------------products logic---------------------------------------------------------------- 



public function view_products(){
$category= Category::all();
return view('admin.pages.products',compact('category'));
}
public function add_product(Request $request){

$product= new Product();

$product->title=$request->title;
$product->description=$request->description;
$product->price=$request->price;
$product->quantity=$request->quantity;
$product->discount_price=$request->discount_price;
$product->category=$request->category;

$image=$request->image;

$imagename=time().'.'.$image->getClientOriginalExtension();

$image->move('uploads/products/',$imagename);

$product->image=$imagename;


$product->save();

$notification = array(
   'message' => 'Product added successfully',
    'alert-type' =>'success'
);

return redirect()->back()->with($notification);

}

public function show_products(){

$show_products= Product::all();



return view('admin.pages.show_products',compact('show_products'));
}

public function product_delete($id){

$product= Product::find($id);


$product->delete();

$notification = array(
    'message' => 'Product deleted successfully',
    'alert-type' => 'error'
);

return redirect()->back()->with($notification);
}

public function product_edit($id){
$category=Category::all();
$product= Product::find($id);
return view('admin.pages.edit_product',compact('product','category'));

}


public function update_product(Request $request,$id){
$product= Product::find($id);


$product->title=$request->title;
$product->description=$request->description;
$product->price=$request->price;
$product->quantity=$request->quantity;
$product->discount_price=$request->discount_price;
$product->category=$request->category;

$image=$request->image;

if($image){
    $imagename=time().'.'.$image->getClientOriginalExtension();
    $image->move('uploads/products/',$imagename);
    $product->image=$imagename;
}

$product->save();

$notification = array(
   'message' => 'Product updated successfully',
    'alert-type' =>'success'
);

return redirect()->route('show_products')->with($notification);

}

public function product_details($id){

$product= Product::find($id);


return view('home.pages.product_details',compact('product'));

}

}