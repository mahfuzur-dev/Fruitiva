@extends('layouts.dashboard')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('home')}}">Home</a>/
        <a href="javascript:void(0);">Product</a>
    </li>
</ol>
<div class="row">
     <div class="col-lg-12">
          <div class="card">
               <div class="card-header">
                    <h3>View Product List</h3>
               </div>
               <div class="card-body">
                    <table class="table table-striped table-hover">
                         <tr>
                              <th>SL No</th>
                              <th>Category Name</th>
                              <th>Product Name</th>
                              <th>Product Price</th>
                              <th>Discount</th>
                              <th>Brand</th>
                              <th>Preview</th>
                              <th>Action</th>
                         </tr>
                         @foreach ($all_products as $key=>$product)
                              <tr>
                                   <td>{{$key+1}}</td>
                                   <td>{{$product->rel_to_category->category_name}}</td>
                                   <td>{{$product->product_name}}</td>
                                   <td>{{$product->product_price}}</td>
                                   <td>{{$product->product_discount}}</td>
                                   <td>{{$product->product_brand}}</td>
                                   <td>
                                        <img style="width: 40px;height:40px;border-radius:5px;" src="{{asset('uploads/product/preview')}}/{{$product->preview}}" alt="">
                                   </td>
                                   <td>
                                        <div class="dropdown">
                                             <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                  <i class="bx bx-dots-vertical-rounded"></i>
                                             </button>
                                             <div class="dropdown-menu">
                                                  <a class="dropdown-item" href="{{route('inventory',$product->id)}}"><i class="bx bx-archive me-1"></i> Inventory</a>
                                                  <a class="dropdown-item" href="{{route('delete.product',$product->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                                             </div>
                                        </div>
                                   </td>
                              </tr>
                         @endforeach
                    </table>
               </div>
          </div>
     </div>
</div>
@endsection