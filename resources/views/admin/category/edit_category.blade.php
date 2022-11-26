@extends('layouts.dashboard')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('home')}}">Home</a>/
        <a href="javascript:void(0);">Category</a>
    </li>
</ol>
<div class="row">
     <div class="col-lg-8 m-auto">
          <div class="card">
               <div class="card-header">
                    <h3>Edit Category</h3>
               </div>
               @if (session('success'))
                <div class="alert alert-warning">{{session('success')}}</div>
               @endif
               <div class="card-body">
                    <form action="{{route('update.category')}}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="mb-3">
                              <label for="" class="form-label">Category Name</label>
                              <input type="text" class="form-control" name="category_name" value="{{$all_info->category_name}}">
                              <input type="hidden" class="form-control" name="category_id" value="{{$all_info->id}}">
                         </div>
                         <div class="mb-3">
                              <label for="" class="form-label">Category Image</label>
                              <input type="file" class="form-control" name="category_image">
                         </div>
                         <div class="mb-3">
                              <img style="width: 40px;height:40px" src="{{asset('uploads/category')}}/{{$all_info->category_image}}" alt="">
                         </div>
                         <div class="mb-3">
                              <button type="submit" class="btn btn-success">Update Category</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>
@endsection