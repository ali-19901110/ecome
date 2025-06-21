@extends('layouts.master')
@section('route','/subcategories')
@section('table', 'subcategory')



@section('main')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


 <form method="POST" action="{{route('subcategories.store')}}" class="mt-5">
            @csrf
        <div class="mb-3">
            <label for="nameId" class="form-label">Name</label>
            <input type="text" name="name" class="form-control border border-dark p-1" id="nameId" value="{{old('name')}}">
        </div>
          <div class="mb-3">
            <label for="cateId" class="form-label ">Choose Category</label>
            <select class="form-select" id="cateId" name="cate">
                @foreach ($categories as $category)
                   <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Create" class="btn btn-success">
        </form>

@endsection