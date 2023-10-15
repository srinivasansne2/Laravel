@extends('layouts.app')
@section('main')
<div class="d-flex justify-content-between">
    <h5><i class="fa-solid fa-list"></i> Product Detial</h5>
    <a href="/products/create" class="btn btn-primary"><i class="fa-solid fa-cart-plus" style="color: #ffffff;"></i> New Product</a>
  </div>

  <div class="col-md-12 table-responsive mt-3">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>P.No</th>
          <th>Image</th>
          <th>Name</th>
          <th>M.R.P</th>
          <th>Selling Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
        @php
         $index=($products->currentPage()-1) * $products ->perPage() +  $loop->iteration; 
        @endphp
        <tr>
          <td>{{$index}}</td>
          <td><img src="img/{{ $product->image}}" style="width: 50px; height: 50px; object-fit: contain;" alt="Gold Ring"></td>
          <td><a href="products/show/{{$product->id }}">{{$product->name}}</a></td>
          <td>${{$product->mrp}}</td>
          <td>${{$product->price}}</td>
          <td>
            <a href="products/edit/{{$product->id }}" class="btn btn-dark btn-sm"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
            <a href="products/delete/{{$product->id }}" onclick="return confirm('Are You Sure You Want to Delete?')" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
          </td>
      </tr>
        @endforeach
      </tbody>
    </table>
    {{$products->links()}}
  </div>
@endsection