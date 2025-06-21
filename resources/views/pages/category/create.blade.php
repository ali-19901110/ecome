@extends('layouts.master')

@section('route','/categories')
@section('table', 'category')

@section('main')

@if ($errors->any())
    <div class="alert alert-danger mt-2 p-0">
        <ul >
            @foreach ($errors->all() as $error)
                <li >{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 <form method="POST" action="{{route('categories.store')}}" class="mt-5">
            @csrf
        <div class="mb-3">
            <label for="nameId" class="form-label">Name</label>
            <input type="text" name="name_cate" class="form-control border border-dark p-1" id="nameId" value="{{old('name')}}">
        </div>
        <input type="submit" value="Create" class="btn btn-success">
        </form>
@endsection