<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class productcontroller extends Controller
{
    public function index()
    {
        $product=product::latest()->paginate(5);
        return view('products.index',['products'=>$product]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name'=>'required',
            'desc'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
       $imageName=time().'.'.$request->image->extension();
       $request->image->move(public_path('products'),$imageName);

       $product=new product;
       $product->image=$imageName;
       $product->name=$request->name;
       $product->description=$request->desc;
       $product->save();
       return back()->withSuccess('Product Created!!');
    }public function edit($id)
    {
       $pro=product::where('id',$id)->first();
       return view('products.edit',['product'=>$pro]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'desc'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        
       $product=product::where('id',$id)->first();
        if(isset($request->image))
        {
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('products'),$imageName);
            $product->image=$imageName;
        }
       
       $product->name=$request->name;
       $product->description=$request->desc;
       $product->save();
       return back()->withSuccess('Product Updated!!');
    }
    public function destroy($id)
    {
        $pro=product::where('id',$id)->first();
        $pro->delete();
        return back()->withSuccess('Product has been Removed!!');
    }
    public function show($id)
    {
        $pro=product::where('id',$id)->first();
        return view('products.show',['product'=>$pro]);
    }
}
