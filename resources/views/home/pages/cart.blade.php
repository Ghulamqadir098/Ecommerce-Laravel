@extends('home.layout.layout')


@section('slider')

<table class="table table-primary">
    <thead>
      <tr>
        <th scope="col">Product Title</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
<?php $total=0 ?>
        @foreach ($cart as $item)
            

        <tr class="table-success">
            <th scope="row">{{$item->product_title}}</th>
            <td>{{$item->quantity}}</td>
            <td>{{$item->price}}</td>
            <td>
                <img src="./uploads/products/{{$item->image}}" class="img-fluid" style="height: 15vh !important;border-radius: 0px !important; width: 8vw !important" width="200px" alt="{{$item->image}}">

            </td>
            <td>

                <a 
                {{-- onclick="return confirm('Are you sure you want to delete this Product')" --}}
                class="btn btn-sm btn-danger" href="{{route('remove_item',$item->id)}}">Remove</a>

            </td>
    <?php  $total=$total+ $item->price ?>
          </tr>
        @endforeach
    
    </tbody>
  </table>  
<div class="text-center">
    <p>Total Amount: {{$total}}</p>
</div>

<div class="d-flex flex-column justify-content-center align-items-center">
<h2>Proceed to Order</h2>
<div>
<a class="btn btn-sm btn-success" href="{{route('cash_order')}}">Cash on Delivery</a>
<a class="btn btn-sm btn-info" href="{{(route('stripe',$total))}}">Card Payment</a>

</div>
</div>


@endsection