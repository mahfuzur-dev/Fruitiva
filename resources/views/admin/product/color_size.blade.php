@extends('layouts.dashboard')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('home')}}">Home</a>/
        <a href="javascript:void(0);">Product</a>
    </li>
</ol>
<div class="row">
     <div class="col-lg-8">
          <div class="card">
               <div class="card-header">
                    <h3>View Color List</h3>
               </div>
               @if (session('delete_color'))
                    <div class="alert alert-success">
                         {{session('delete_color')}}
                    </div>
               @endif
               <div class="card-body">
                    <table class="table table-striped table-hover">
                         <tr>
                              <th>Sl No</th>
                              <th>Color Name</th>
                              <th>Color</th>
                              <th>Action</th>
                         </tr>
                         @foreach ($all_colors as $key=>$color)
                              <tr>
                                   <td>{{$key+1}}</td>
                                   <td>{{$color->color_name}}</td>
                                   <td>
                                        <button style="border: none;background:#{{$color->color_code}};outline:none;padding:10px;"></button>
                                   </td>
                                   <td>
                                        <div class="dropdown">
                                             <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                  <i class="bx bx-dots-vertical-rounded"></i>
                                             </button>
                                             <div class="dropdown-menu">
                                                  <a class="dropdown-item" href="{{route('delete.color',$color->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
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
                    <h3>Add Color</h3>
               </div>
               @if (session('success_color'))
                    <div class="alert alert-success">
                         {{session('success_color')}}
                    </div>
               @endif
               <div class="card-body">
                    <form action="{{route('add.color')}}" method="POST">
                         @csrf
                         <div class="mb-3">
                              <label for="" class="form-label">Color Name</label>
                              <input type="text" class="form-control" name="color_name">
                         </div>
                         @error('color_name')
                              <strong class="text-danger">{{$message}}</strong>
                         @enderror
                         <div class="mb-3">
                              <label for="" class="form-label">Color Code</label>
                              <input type="text" class="form-control" name="color_code">
                         </div>
                         @error('color_code')
                              <strong class="text-danger">{{$message}}</strong>
                         @enderror
                         <div class="mb-3">
                              <button type="submit" class="btn btn-success">Add Color</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>
<div class="row mt-5">
     <div class="col-lg-8">
          <div class="card">
               <div class="card-header">
                    <h3>View Size List</h3>
               </div>
               @if (session('delete_size'))
                    <div class="alert alert-success">
                         {{session('delete_size')}}
                    </div>
               @endif
               <div class="card-body">
                    <table class="table table-striped table-hover">
                         <tr>
                              <th>Sl No</th>
                              <th>Size Name</th>
                              <th>Action</th>
                         </tr>
                         @foreach ($all_sizes as $key=>$size)
                              <tr>
                                   <td>{{$key+1}}</td>
                                   <td>{{$size->size_name}}</td>
                                   <td>
                                        <div class="dropdown">
                                             <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                  <i class="bx bx-dots-vertical-rounded"></i>
                                             </button>
                                             <div class="dropdown-menu">
                                                  <a class="dropdown-item" href="{{route('delete.size',$size->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
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
                    <h3>Add Size</h3>
               </div>
               @if (session('success_size'))
                    <div class="alert alert-success">
                         {{session('success_size')}}
                    </div>
               @endif
               <div class="card-body">
                    <form action="{{route('add.size')}}" method="POST">
                         @csrf
                         <div class="mb-3">
                              <label for="" class="form-label">Size Name</label>
                              <input type="text" class="form-control" name="size_name">
                         </div>
                         @error('size_name')
                              <strong class="text-danger">{{$message}}</strong>
                         @enderror
                         
                         <div class="mb-3">
                              <button type="submit" class="btn btn-success">Add Size</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>
@endsection