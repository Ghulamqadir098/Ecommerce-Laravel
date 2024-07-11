@extends('admin.layout.layout')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

        
            <div class="d-flex flex-column align-items-center justify-content-center ">
                <h2>Add Product</h2>

                <form action="{{route('update_product',$product->id)}}" method="POST" enctype="multipart/form-data" style="width: 40vw">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Product Title</label>
                      <input type="text" class="form-control" name="title" value="{{$product->title}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Product Description</label>
                      <input type="text" class="form-control" name="description" value="{{$product->description}}" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Product Price</label>
                        <input type="number" name="price" class="form-control" value="{{$product->price}}" id="exampleInputPassword1">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Discount Price</label>
                        <input type="text" name="discount_price" class="form-control" value="{{$product->discount_price}}" id="exampleInputPassword1">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Product Quantity</label>
                        <input type="number" min="0" name="quantity" class="form-control" value="{{$product->quantity}}" id="exampleInputPassword1">
                      </div>
                 
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Product Category</label>
                       <select name="category" id="">
                        @foreach ($category as $item)
                        <option value="{{$item->category_name}}">{{
                            $item->category_name
                            }}</option>
                        @endforeach
                    </select>                        
                      </div>

                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">
                            <img style="height: 15vh; width: 10vh;" src="{{ asset('uploads/products/' . $product->image) }}" alt="">
                          </label>
                        <input type="file" min="0" name="image" class="form-control" value="{{$product->image}}" id="exampleInputPassword1">
                      </div>
                    {{-- <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> --}}
                    <button type="submit" class="btn btn-warning">Submit</button>
                  </form>
                  
                  
            </div>


        </div>

    </div>
@endsection
