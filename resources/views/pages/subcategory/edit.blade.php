@extends('layouts.master')
@section('route','/subcategories')
@section('table', 'subcategory')



@section('main')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


<form method="POST" action="{{route('subcategories.update', $subcategory->id)}}" class="mt-5">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nameId" class="form-label">Name</label>
        <input type="text" value="{{$subcategory->name}}" name="name" class="form-control border border-dark p-1"
            id="nameId">
    </div>
    
    <div class="mb-3">
        <label for="subcateId" class="form-label ">Choose SubCategory</label>
        <select class="form-select border border-dark  p-2" id="subcateId" name="cate">
            {{-- <option selected>Open this select menu</option> --}}
            @foreach ($categories as $category)
            {{-- <option @if($category->id == $subcategory->subcategory_id) selected @endif
                value="{{$subcategory->id}}">{{$subcategory->name}}</option> --}}
            <option @selected($category->id == $subcategory->category_id)
                value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" value="Update" class="btn btn-success">
</form>

@endsection