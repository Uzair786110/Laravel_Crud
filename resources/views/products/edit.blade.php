@extends('products.layout')
@section('main')
<div class="container">
       <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
                <h3>Product Edit</h3>
                <form method="POST" action="/{{$product->id}}/update" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" id="" value="{{old('name',$product->name)}}">
                        @if($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>description</label>
                        <textarea name="desc" id="" cols="30"class="form-control" rows="4">{{old('desc',$product->description)}}</textarea>
                        @if($errors->has('desc'))
                        <span class="text-danger">{{$errors->first('desc')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                       <input type="file" name="image" id="" class="form-control">
                       @if($errors->has('image'))
                        <span class="text-danger">{{$errors->first('image')}}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
       </div>
       </div>
       @endsection