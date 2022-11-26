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
                    <h3>Inventory List</h3>
               </div>
               @if (session('del_success'))
                    <div class="alert alert-success">{{session('del_success')}}</div>
               @endif
               <div class="card-body">
                    <table class="table table-striped table-hover">
                         <tr>
                              <th>Sl No</th>
                              <th>Product Name</th>
                              <th>Color Name</th>
                              <th>Size Name</th>
                              <th>Quantity</th>
                              <th>Action</th>
                         </tr>
                         @foreach ($all_inventories as $key=>$inventory)
                              <tr>
                                   <td>{{$key+1}}</td>
                                   <td>{{$inventory->product_name}}</td>
                                   <td>{{$inventory->rel_to_color->color_name}}</td>
                                   <td>{{$inventory->rel_to_size->size_name}}</td>
                                   <td>{{$inventory->quantity}}</td>
                                   <td>
                                        <div class="dropdown">
                                             <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                  <i class="bx bx-dots-vertical-rounded"></i>
                                             </button>
                                             <div class="dropdown-menu">
                                                  <a class="dropdown-item" href="{{route('delete.inventory',$inventory->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
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
                    <h3>Add Inventory</h3>
               </div>
               @if (session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
               @endif
               <div class="card-body">
                    <form action="{{route('add.inventory')}}" method="POST">
                         @csrf
                         <div class="mb-3">
                              <label for="" class="form-label">Product Name</label>
                              <input type="hidden" name="product_id" value="{{$all_product_info->id}}">
                              <input type="text" readonly class="form-control" name="product_name" value="{{$all_product_info->product_name}}">
                         </div>
                         <div class="mb-3">
                              <label for="" class="form-label">Color</label>
                              <select name="color_name" class="form-control">
                                   <option value=""> ---- Select Color ---- </option>
                                   @foreach ($all_colors as $color)
                                        
                                   <option value="{{$color->id}}">{{$color->color_name}}</option>
                                   @endforeach
                              </select>
                         </div>
                         <div class="mb-3">
                              <label for="" class="form-label">Size</label>
                              <select name="size_name" class="form-control">
                                   <option value=""> ---- Select Size ---- </option>
                                   @foreach ($all_sizes as $size)
                                        
                                   <option value="{{$size->id}}">{{$size->size_name}}</option>
                                   @endforeach
                              </select>
                         </div>
                         <div class="mb-3">
                              <label for="" class="form-label">Quantity</label>
                              <input type="number" name="quantity" class="form-control">
                         </div>
                         @error('quantity')
                              <strong class="text-danger">{{$message}}</strong>
                         @enderror
                         <div class="mb-3">
                              <button type="submit" class="btn btn-info">Add Inventory</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>
@endsection