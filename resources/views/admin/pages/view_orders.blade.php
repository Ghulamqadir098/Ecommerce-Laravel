@extends('admin.layout.layout')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex flex-column align-items-center justify-content-center ">
               

                <div class="d-flex flex-column my-2 align-items-center justify-content-center border rounded p-3 border-white">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone#</th>
                                <th scope="col">Address</th>

                                <th scope="col">Product-Title</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Delivery Status</th>
                                <th scope="col">Image</th>
                                <th scope="col">Print PDF</th>

    
                            </tr>
                        </thead>
                        <tbody>
                           
@foreach ($order as $item)
<tr>
    <th scope="row">{{$item->name}}</th>
    <td>{{$item->email}}</td>
    <td>{{$item->phone}}</td>
    <td>{{$item->address}}</td>
    <td>{{$item->product_title}}</td>
    <td>{{$item->quantity}}</td>
    <td>{{$item->price}}$</td>
    <td>{{$item->payment_status}}</td>
    <td>{{$item->delivery_status}}
<br>
@if ($item->delivery_status=="processing")
<a href="{{route('delivered',$item->id)}}" class="btn btn-sm btn-primary">Delivered</a>
@else
<a href="{{route('processing',$item->id)}}" class="btn btn-sm btn-warning">Processing</a>
@endif
    </td>
    <td>
        <img src="./uploads/products/{{$item->image}}" class="img-fluid" style="height: 15vh !important;border-radius: 0px !important; width: 8vw !important" width="200px" alt="{{$item->image}}">

    </td>
<td>
    <a href="{{route('print_pdf',$item->id)}}" class="btn btn-sm btn-primary">Print Pdf</a>
</td>
</tr>
@endforeach
    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
