@extends('layouts.master')
@section('route','/products')
@section('table', 'product')



@section('main')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif



@endsection