@extends('layouts.dashboard')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('home')}}">Home</a>/
        <a href="javascript:void(0);">Sub-Category</a>
    </li>
</ol>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Sub-Category List</h3>
            </div>
            @if (session('del_success'))
               <div class="alert alert-warning">{{session('del_success')}}</div>      
            @endif
            <div class="card-body">
               <table class="table table-striped table-hover">
                    <tr>
                         <th>SL No</th>
                         <th>Category Name</th>
                         <th>Subcategory Name</th>
                         <th>Action</th>
                    </tr>
                    @foreach ($all_subcategories as $key=>$subcategory)
                         <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$subcategory->rel_to_category->category_name}}</td>
                              <td>{{$subcategory->sub_category}}</td>
                              <td>
                                   <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="{{route('delete.sub_category',$subcategory->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
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
            @if (session('exist'))
                <div class="alert alert-danger">
                    {{session('exist')}}
                </div>
            @endif
            <div class="card-body">
                <form action="{{route('add.subcategory')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <select name="category_id" id="" class="form-control">
                          <option value=""> -- Select Category -- </option>
                          @foreach ($all_categories as $category)
                               
                          <option value="{{$category->id}}"> {{$category->category_name}} </option>
                          @endforeach
                        </select>
                    </div>
                    @error('category_id')
                         <strong class="text-danger">{{$message}}</strong>
                    @enderror
                    <div class="mb-3">
                        <label for="" class="form-label">Sub Category Name</label>
                        <input type="text" class="form-control" name="sub_category">
                    </div>
                     @error('sub_category')
                         <strong class="text-danger">{{$message}}</strong>
                    @enderror
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Add Sub-Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection