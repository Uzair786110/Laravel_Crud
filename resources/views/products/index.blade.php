@extends('products.layout')
@section('main')

    <div class="container">
        <h1>Products</h1>
        <div class="text-right">
        <a href="create" class="btn btn-dark my-2">New Product</a>
        </div>
        <table class="table table-hover">
    <thead>
      <tr>
        <th>S No.</th>
        <th>Name</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td><a href="/{{$product->id}}/show" class="text-dark">{{$product->name}}</a></td>
        <td><img src="products/{{$product->image}}" class="rounded-circle" width="50px" height="50px" ></td>
        <td><a href="products/{{$product->id}}/edit" class="btn btn-dark btn-small">Edit</a>
        <a href="products/{{$product->id}}/delete" class="btn btn-danger btn-small">Delete</a></td>
      </tr>
      <tr>
        @endforeach
    
    </tbody>
  </table>
  {{$products->links()}}
    </div>
    @endsection
