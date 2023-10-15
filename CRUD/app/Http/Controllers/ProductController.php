<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index (){
        $products=Product::latest()->paginate(5);
        return view("products.index",['products'=>$products]);
    }
    public function create (){
        return view('products.create');
    }
    public function store(Request $request){
        //dd($request);
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'mrp'=>'required|numeric',
            'sellingprice'=>'required|numeric',
            'productimg'=>'required|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        $imagename=time().".".$request->productimg->extension();
        $request->productimg->move(public_path('img'),$imagename);

        $product=new Product;
        $product->image=$imagename;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->mrp=$request->mrp;
        $product->price=$request->sellingprice;
        $product->save();
        return back()->withSuccess('Product Detials Added Success...');
    }
    public function show($id){
        $product=Product::where('id',$id)->first();
        return view("products.show",['product'=>$product]);
    }
    public function edit($id){
        $product=Product::where('id',$id)->first();
        return view("products.edit",['product'=>$product]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'mrp'=>'required|numeric',
            'sellingprice'=>'required|numeric',
            'productimg'=>'nullable|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $product=Product::where('id',$id)->first();

        if(isset($request->image)){
            $imagename=time().".".$request->productimg->extension();
            $request->productimg->move(public_path('img'),$imagename);
            $product->image=$imagename;
        }

        $product->name=$request->name;
        $product->description=$request->description;
        $product->mrp=$request->mrp;
        $product->price=$request->sellingprice;
        $product->save();
        return back()->withSuccess('Product Detials Updated Success...');
    }
    public function destroy($id){
        $product=Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product Detials Deleted Success...');
    }
}
