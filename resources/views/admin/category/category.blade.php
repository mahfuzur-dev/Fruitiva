@extends('layouts.dashboard')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('home')}}">Home</a>/
        <a href="javascript:void(0);">Category</a>
    </li>
</ol>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Category List</h3>
            </div>
            @if (session('delete'))
                <div class="alert alert-warning">{{session('delete')}}</div>
            @endif
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Sl No</th>
                        <th>Category Name</th>
                        <th>Added By</th>
                        <th>Category Image</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($all_categories as $key=>$category)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->rel_to_user->name}}</td>
                            <td>
                                <img style="width: 40px;height:40px; border-radius:5px;" src="{{asset('uploads/category')}}/{{$category->category_image}}" alt="">
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="{{route('edit.category',$category->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="{{route('delete.category',$category->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Add Category</h3>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <div class="card-body">
                <form action="{{route('add.category')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" name="category_name" class="form-control">
                    </div>
                    @error('category_name')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                    <div class="mb-3">
                        <label for="" class="form-label">Category Image</label>
                        <input type="file" name="category_image" class="form-control">
                    </div>
                    @error('category_image')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection