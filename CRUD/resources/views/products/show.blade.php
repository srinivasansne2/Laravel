@extends('layouts.app')
@section('main')
<h5><i class="fa-regular fa-pen-to-square"></i> View Product</h5>
          <hr>
          <nav class="my-3">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active">View Product</li>
              </ol>
          </nav>
    </div>

    <div class="card">
      <img src="/img/{{$product->image}}" class="card-img-top" alt="{{$product->name}}">
      <div class="card-body">
        <h5 class="card-title">{{$product->name}}</h5>
        <p class="card-text">{{$product->description}}</p>
        <p class="fw-bold">M.R.P:<small class="text-danger text-decoration-line-through"> ${{$product->mrp}}</small></p>
        <p class="fw-bold">Selling Price:<small class="text-success"> ${{$product->price}}</small></p>
      </div>
@endsection