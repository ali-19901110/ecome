@extends('layouts.master')
@section('route','/categories')
@section('table', 'category')

@section('main')
@if ($errors->any())
<div class="alert alert-danger mt-5">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
</div>

<h2 class="text-center mt-3">Update Product</h2>
<div class="container">
    <form method="POST" action="{{route('categories.update',$category->id)}}" class="mt-5">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nameId" class="form-label">Category Name</label>
            <input type="text" value="{{$category->name}}" name="name" class="form-control border border-dark p-1"
                placeholder="Enter Category Name" id="nameId">
        </div>

        <input type="submit" value="Update" class="btn btn-success">
    </form>
    @endsection