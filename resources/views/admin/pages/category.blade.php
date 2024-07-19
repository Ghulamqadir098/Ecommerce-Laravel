@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            {{-- @if (session()->has('message'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{
        
        session()->get('message')
        
        }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

    </button>
  </div>
  
    
@endif --}}

            <div class="d-flex flex-column align-items-center justify-content-center ">
                <h2>Add Category</h2>
                <form method="POST" action="{{ route('add_category') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="exampleInputEmail1"
                            aria-describedby="emailHelp">

                    </div>
                    {{-- <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> --}}
                    <button type="submit" class="btn btn-warning">Submit</button>
                </form>


            </div>


            <div class="d-flex flex-column my-2 align-items-center justify-content-center border rounded p-3 border-white">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->category_name }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                <td>

                                    <a onclick="return confirm('Are you sure you want to delete this Category')"
                                        class="btn btn-md btn-danger"
                                        href="{{ route('category_delete', $item->id) }}">Delete</a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>


            </div>



        </div>
    </div>
@endsection
