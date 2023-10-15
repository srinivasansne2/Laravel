@extends('layouts.app')
@section('main')
<div class="row">
    <h5><i class="fa-solid fa-square-plus"></i> Add New Product</h5>
    <hr>
    <nav class="my-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Add New Product</li>
        </ol>
    </nav>

    <div class="col-md-8">
        <form action="/product/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control 
                    @if($errors->has('name')) {{'is-invalid'}} @endif" 
                    name="name" id="name" placeholder="Enter Product Name" value="{{old('name')}}">
                    @if($errors->has('name'))
                     <div class="invalid-feedback">{{$errors->first('name')}}</div>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="mrp" class="form-label">M.R.P</label>
                    <input type="text" class="form-control
                    @if($errors->has('mrp')) {{'is-invalid'}} @endif" 
                    name="mrp" id="mrp" placeholder="Enter Product M.R.P" value="{{old('mrp')}}">
                    @if($errors->has('mrp'))
                     <div class="invalid-feedback">{{$errors->first('mrp')}}</div>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="sellingprice" class="form-label">Selling Price</label>
                    <input type="text" class="form-control
                    @if($errors->has('sellingprice')) {{'is-invalid'}} @endif"
                    name="sellingprice" id="sellingprice" placeholder="Enter Selling Price" value="{{old('sellingprice')}}">
                    @if($errors->has('sellingprice'))
                     <div class="invalid-feedback">{{$errors->first('sellingprice')}}</div>
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="description" class="form-label" id="description">Description</label>
                    <textarea name="description" id="description" class="form-control 
                    @if($errors->has('description')) {{'is-invalid'}} @endif"
                    style="resize: none; height: 150px;" placeholder="Enter Product Description">{{old('description')}}</textarea>
                    @if($errors->has('description'))
                     <div class="invalid-feedback">{{$errors->first('description')}}</div>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="productimg" class="form-label">Product Image</label>
                    <input type="file" class="form-control
                    @if($errors->has('productimg')) {{'is-invalid'}} @endif"
                    name="productimg" id="[productimg]" value="{{old('productimg')}}">
                    @if($errors->has('productimg'))
                     <div class="invalid-feedback">{{$errors->first('productimg')}}</div>
                    @endif
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-dark">Save Product</button>
                <button type="reset" class="btn btn-danger">Clear All</button>
            </div>
        </form>
    </div>
  </div>
@endsection