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
                    <h3>Add Product</h3>
               </div>
               @if (session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
               @endif
               <div class="card-body">
                    <form action="{{route('add.product')}}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="row">
                              <div class="col-lg-6">
                                   <div class="mb-3">
                                        <select name="category_id" id="category_id" class="form-control">
                                             <option value=""> -- Select Category -- </option>
                                             @foreach ($all_categories as $all_category)
                                                  
                                             <option value="{{$all_category->id}}"> {{$all_category->category_name}} </option>
                                             @endforeach
                                        </select>
                                        @error('category_id')
                                             <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                   </div>
                              </div>
                              <div class="col-lg-6">
                                   <div class="mb-3">
                                        <select name="subcategory_id" id="subcategory_id" class="form-control">
                                             <option value=""> -- Select Sub Category -- </option>
                                            
                                        </select>
                                   </div>
                              </div>
                              <div class="col-lg-6">
                                   <div class="mb-3">
                                        <label for="" class="form-label">Product Name</label>
                                        <input type="text" name="product_name" class="form-control">
                                   </div>
                                   @error('product_name')
                                        <strong class="text-danger">{{$message}}</strong>
                                   @enderror
                              </div>
                              <div class="col-lg-6">
                                   <div class="mb-3">
                                        <label for="" class="form-label">Product Price</label>
                                        <input type="number" name="product_price" class="form-control">
                                   </div>
                                   @error('product_price')
                                        <strong class="text-danger">{{$message}}</strong>
                                   @enderror
                              </div>
                              <div class="col-lg-6">
                                   <div class="mb-3">
                                        <label for="" class="form-label">Product Brand</label>
                                        <input type="text" name="product_brand" class="form-control">
                                   </div>
                              </div>
                              <div class="col-lg-6">
                                   <div class="mb-3">
                                        <label for="" class="form-label">Product Discount</label>
                                        <input type="number" name="product_discount" class="form-control">
                                   </div>
                              </div>
                              <div class="col-lg-12">
                                   <div class="mb-3">
                                        <label for="" class="form-label">Short Description</label>
                                        <input type="text" name="short_desp" class="form-control">
                                   </div>
                                   @error('short_desp')
                                        <strong class="text-danger">{{$message}}</strong>
                                   @enderror
                              </div>
                              <div class="col-lg-12">
                                   <div class="mb-3">
                                        <label for="" class="form-label">Description</label>
                                        <textarea name="long_desp" id="summernote" cols="30" rows="5" class="form-control"></textarea>
                                   </div>
                                   @error('long_desp')
                                        <strong class="text-danger">{{$message}}</strong>
                                   @enderror
                              </div>
                              <div class="col-lg-6">
                                   <div class="mb-3">
                                        <label for="" class="form-label">Product Preview</label>
                                        <input type="file" class="form-control" name="preview">
                                   </div>
                              </div>
                              <div class="col-lg-6">
                                   <div class="mb-3">
                                        <label for="" class="form-label">Product Thumbnail</label>
                                        <input type="file" multiple class="form-control" name="thumbnail[]">
                                   </div>
                                    @error('thumbnail')
                                        <strong class="text-danger">{{$message}}</strong>
                                   @enderror
                              </div>
                              <div class="col-lg-6 m-auto">
                                   <div class="mb-3 text-center">
                                        <button type="submit" class="btn btn-success">Add Product</button>
                                   </div>
                              </div>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>
@endsection
@section('footer_script')
<script>
     $(document).ready(function() {
          $('#summernote').summernote();
     });
</script>
<script>
     $('#category_id').change(function(){
          var category_id = $(this).val();
          $.ajaxSetup({
             headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
          });
          $.ajax({
               type:'POST',
               url:'/getsubcategory',
               data:{'category_id':category_id},
               success:function(data){
                    $('#subcategory_id').html(data);
               }
          });
     });
</script>
@endsection