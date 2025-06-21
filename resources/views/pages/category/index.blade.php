@extends('layouts.master')
@section('route','/categories')
@section('table', 'category')



@section('main')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3 d-flex">
                    <h6 class="text-white text-capitalize ps-3">Category table</h6>
                    <div class="ms-auto me-5 bg-success p-2 rounded-2">
                        <a href="{{route('categories.create')}}" class="text-white text-decoration-none ">Create Category</a>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Created At</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Update At</th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Control</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allCategoriesFromDB as $category)
                            <tr>
                                <td>
                                    <div class="d-flex px-2">
                                        <div>
                                        </div>
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm">{{$category->id}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$category->name}}</p>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{$category->created_at}}</span>
                                </td>
                                <td>
                                    <span class="text-xs font-weight-bold">{{$category->updated_at}}</span>
                                </td>
                                <td>
                                    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info cus-our-btn p-1 small">Edit</a>
                                    <form class="d-inline" method="POST" action="{{route('categories.destroy',$category->id
                                    )}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger cus-our-btn p-1">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection