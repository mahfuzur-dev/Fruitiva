@extends('frontend.master')
@section('content')
<!-- BreadCrumbs HTML Start -->
<section id="breadscrumb">
     <div class="container">
          <div class="row">
               <div class="col-lg-12">
                    <div class="breadcrumbs_text">
                         <div class="row">
                              <div class="col-lg-6">
                                   <h3>Shop Grid Page</h3>
                              </div>
                              <div class="col-lg-6">
                                   <div class="breadcrumb_link">
                                        <ul>
                                             <li><a href="{{route('frontend')}}"><i class="fa-solid fa-house-chimney"></i> Go Home</a>
                                             </li>
                                        </ul>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</section>
<!-- BreadCrumbs HTML End -->
<!-- Shop Grid HTML Start -->
<section id="shop_grid">
     <div class="container">
          <div class="row">
               <div class="col-lg-3">
                    <div class="search_category">
                         <h3>Browse By Price</h3>
                             <div class="row">
                                   <div class="col-lg-6">
                                        <input type="number" id="min" value="{{@$_GET['min']}}" placeholder="Min" name="min" class="form-control">
                                   </div>
                                   <div class="col-lg-6">
                                        <input type="number" id="max" value="{{@$_GET['max']}}" placeholder="Max" name="max" class="form-control">
                                   </div>
                                   <div class="col-lg-12 text-center mt-3">
                                        <button type="submit" id="range" class="btn btn-success">Submit</button>
                                   </div>
                             </div>
                    </div>
                    <div class="search_category">
                         <h3>Browse By Category</h3>
                              <ul>
                                   @foreach ($all_categories as $category)
                                        <li>
                                             <input type="radio" value="{{$category->id}}" class="category_id"  name="category"    id="category{{$category->id}}" @if (isset($_GET['category']))
                                                  @if ($_GET['category'] == $category->id)
                                                       checked 
                                                  @endif
                                                  @endif>
                                                  <label for="category{{$category->id}}">{{$category->category_name}}</label>
                                             </li>
                                   @endforeach
                              </ul>
                    </div>
                    <div class="search_category">
                         <h3>Filter By Color</h3>
                         <form action="">
                              <ul>
                                   @foreach ($colors as $color)
                                       <li>
                                        <input type="radio" class="color_id" name="color" id="color{{$color->id}}" value="{{$color->id}}"@if (isset($_GET['color']))
                                                  @if ($_GET['color'] == $color->id)
                                                       checked 
                                                  @endif
                                                  @endif>
                                             <label for="color{{$color->id}}">{{$color->color_name}}</label>
                                             </li>
                                   @endforeach
                              </ul>
                         </form>
                    </div>
                    <div class="search_category">
                         <h3>Filter By Size</h3>
                              <ul>
                                   @foreach ($sizes as $size)
                                        <li><input type="radio" class="size_id" name="size" id="size{{$size->id}}" value="{{$size->id}}"@if (isset($_GET['size']))
                                                  @if ($_GET['size'] == $size->id)
                                                       checked 
                                                  @endif
                                                  @endif>
                                                <label for="size{{$size->id}}">{{$size->size_name}}</label>
                                             </li>
                                   @endforeach
                              </ul>
                    </div>
               </div>
               <div class="col-lg-9">
                    <div class="grid_top">
                         <select name="" class="form-select" id="sort">
                              <option value="0">Default Sorting</option>
                              <option value="1">A to Z</option>
                              <option value="2">Z to A</option>
                              <option value="3">Low to High</option>
                              <option value="4">High to Low</option>
                         </select>
                    </div>
                    <div class="row">
                         @foreach ($all_products as $product)
                              <div class="col-lg-4">
                                   <div class="fruit_box">
                                        <img src="{{asset('uploads/product/preview')}}/{{$product->preview}}" alt="capsicum">
                                        @if ($product->product_discount)
                                        <strong>{{$product->product_discount}} % Off</strong>
                                        @endif
                                        <h4>{{ $product->product_name}}</h4>
                                        <a href="#">
                                             <ul>
                                                  <li><i class="fa-solid fa-star"></i></li>
                                                  <li><i class="fa-solid fa-star"></i></li>
                                                  <li><i class="fa-solid fa-star"></i></li>
                                                  <li><i class="fa-solid fa-star"></i></li>
                                                  <li><i class="fa-regular fa-star"></i></li>
                                             </ul>
                                        </a>
                                          <br>
                                        <h5 class="mt-3">{{ $product->after_discount}} TK</h5>
                                        <span><a href="{{route('product.details',$product->slug)}}">Add Cart <i class="fa-solid fa-cart-plus"></i></a></span>
                                   </div>
                              </div>
                         @endforeach
                    </div>
               </div>
          </div>
     </div>
</section>
<!-- Shop Grid HTML End -->
@endsection
@section('footer_script')
<script>
     $(".search_btn").click(function(){
          var search_input = $('#search_input').val();
          var category_id =  $('input[class="category_id"]:checked').val();
          var color_id =  $('input[class="color_id"]:checked').val();
          var size_id =  $('input[class="size_id"]:checked').val();
          var min =  $('#min').val();
          var max =  $('#max').val();
          var sort =  $('#sort :selected').val();
          var link = "{{route('shop')}}"+"?q="+search_input+"&category="+category_id+"&color="+color_id+"&size="+size_id+"&min="+min+"&max="+max+"&sort="+sort;
          window.location.href = link;
     })
     $("#range").click(function(){
          var search_input = $('#search_input').val();
          var category_id =  $('input[class="category_id"]:checked').val();
          var color_id =  $('input[class="color_id"]:checked').val();
          var size_id =  $('input[class="size_id"]:checked').val();
          var min =  $('#min').val();
          var max =  $('#max').val();
          var sort =  $('#sort :selected').val();
          var link = "{{route('shop')}}"+"?q="+search_input+"&category="+category_id+"&color="+color_id+"&size="+size_id+"&min="+min+"&max="+max+"&sort="+sort;
          window.location.href = link;
     })
     $(".category_id").click(function(){
          var search_input = $('#search_input').val();
          var category_id =  $('input[class="category_id"]:checked').val();
          var color_id =  $('input[class="color_id"]:checked').val();
          var size_id =  $('input[class="size_id"]:checked').val();
          var min =  $('#min').val();
          var max =  $('#max').val();
          var sort =  $('#sort :selected').val();
          var link = "{{route('shop')}}"+"?q="+search_input+"&category="+category_id+"&color="+color_id+"&size="+size_id+"&min="+min+"&max="+max+"&sort="+sort;
          window.location.href = link;
     })
     $(".color_id").click(function(){
          var search_input = $('#search_input').val();
          var category_id =  $('input[class="category_id"]:checked').val();
          var color_id =  $('input[class="color_id"]:checked').val();
          var size_id =  $('input[class="size_id"]:checked').val();
          var min =  $('#min').val();
          var max =  $('#max').val();
          var sort =  $('#sort :selected').val();
         var link = "{{route('shop')}}"+"?q="+search_input+"&category="+category_id+"&color="+color_id+"&size="+size_id+"&min="+min+"&max="+max+"&sort="+sort;
          window.location.href = link;
     })
     $(".size_id").click(function(){
          var search_input = $('#search_input').val();
          var category_id =  $('input[class="category_id"]:checked').val();
          var color_id =  $('input[class="color_id"]:checked').val();
          var size_id =  $('input[class="size_id"]:checked').val();
          var min =  $('#min').val();
          var max =  $('#max').val();
          var sort =  $('#sort :selected').val();
          var link = "{{route('shop')}}"+"?q="+search_input+"&category="+category_id+"&color="+color_id+"&size="+size_id+"&min="+min+"&max="+max+"&sort="+sort;
          window.location.href = link;
     })
     $("#sort").change(function(){
          var search_input = $('#search_input').val();
          var category_id =  $('input[class="category_id"]:checked').val();
          var color_id =  $('input[class="color_id"]:checked').val();
          var size_id =  $('input[class="size_id"]:checked').val();
          var min =  $('#min').val();
          var max =  $('#max').val();
          var sort =  $('#sort :selected').val();
          var link = "{{route('shop')}}"+"?q="+search_input+"&category="+category_id+"&color="+color_id+"&size="+size_id+"&min="+min+"&max="+max+"&sort="+sort;
          window.location.href = link;
     })
</script>
@endsection