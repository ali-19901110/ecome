@extends('layouts.master')
@section('route','/products')
@section('table', 'product')



@section('main')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

 <form method="POST" action="{{route('products.store')}}" class="mt-5">
            @csrf
        <div class="mb-3">
            <label for="nameId" class="form-label">Name</label>
            <input type="text" name="name" class="form-control border border-dark p-1" id="nameId" value="{{old('name')}}">
        </div>
          <div class="mb-3">
            <label for="descId" class="form-label">Description </label>
            <input type="text" name="desc" class="form-control border border-dark p-1" id="descId" value="{{old('desc')}}">
        </div>
        <div class="mb-3">
            <label for="priceId" class="form-label">Price </label>
            <input type="text" name ="price" class="form-control border border-dark p-1" id="priceId" value="{{old('price')}}">
        </div>
      
        <div class="mb-3">
            <label for="stockId" class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control border border-dark p-1" id="stockId" value="{{old('stock')}}">
        </div>
          <div class="mb-3">
            <label for="subcateId" class="form-label ">Choose SubCategory</label>
            <select class="form-select" id="subcateId" name="subcate">
                @foreach ($subcategories as $subcategory)
                   <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Create" class="btn btn-success">
        </form>

@endsection