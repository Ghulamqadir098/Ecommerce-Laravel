@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">





            <div class="d-flex flex-column my-2 align-items-center justify-content-center border rounded p-3 border-white">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
            
                      
                    </tr>
                    </thead>
                    <tbody>
            @foreach ($show_products as $item)
            
            <tr>
            <th scope="row">{{$item->title}}</th>
            <td>{{$item->category}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->discount_price}}</td>
            <td>

               <img src="./uploads/products/{{$item->image}}" class="img-fluid" style="height: 15vh !important;border-radius: 0px !important; width: 8vw !important" width="200px" alt="{{$item->image}}">

            </td>
          <td>
            <a 
            onclick="return confirm('Are you sure you want to delete this Product')"
            class="btn btn-sm btn-danger" href="{{route('product_delete',$item->id)}}">Delete</a>

            <a 
            class="btn btn-sm btn-success" href="{{route('product_edit',$item->id)}}">Edit</a>
            </td>
            
            </tr>
            
            @endforeach
            
                    </tbody>
                  </table>
                  
            
            </div>


        </div>
    </div>
@endsection
