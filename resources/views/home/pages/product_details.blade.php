@extends('home.layout.layout')



@section('slider')
    {{-- Exclude slider and do not occupy space --}}

    <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto; width:50%; padding:30px">
        <div class="box">

            <div class="img-box" style="margin:5px 0px">
                <img class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;"
                    src="{{ asset('uploads/products/' . $product->image) }}" alt="">
            </div>
            <div class="detail-box">
                <h5>
                    {{ $product->title }}
                </h5>
                <h6 style="color: #002c3e; font-weight: 600;  text-decoration: line-through;">
                    {{ $product->price }} &#8360;
                </h6>
            </div>
            <div>
                <h6 style="color: #002c3e; font-weight: 600;">
                    Discount Price: {{ $product->discount_price }} &#8360;
                </h6>
            </div>
            <div>
                <h6 style="color: #002c3e; font-weight: 600;">
                    Category: {{ $product->category }}
                </h6>
            </div>
            <div>
                <h6 style="color: #002c3e; font-weight: 600;">
                    Quantity Available: {{ $product->quantity }}
                </h6>
            </div>
            <div>
                <h6 style="color: #002c3e; font-weight: 600;">
                    {{ $product->description }}
                </h6>
            </div>
            <form action="{{ route('add_cart', $product->id) }}" method="POST">
                @csrf
                <input type="number" name="cart_quantity" value="1" min="1">
                <input type="submit" class="option1" value="ADD TO CART">
            </form>
        </div>
    </div>

    @endsection


@section('home_content')

@endsection
