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
                                        <h3>Shop Details Page</h3>
                                   </div>
                                   <div class="col-lg-6">
                                        <div class="breadcrumb_link">
                                             <ul>
                                                  <li><a href=""><i class="fa-solid fa-house-chimney"></i> Go Home</a></li>
                                                  <li><a href=""><i class="fa-solid fa-basket-shopping"></i> Go Shope Page</a></li>
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
     <!-- Shop Details HTML Start -->
     <section id="shop_details">
          <div class="container">
             <div class="row">
                  @php
                         if($total_review == 0){
                              $avg = 0;
                         }
                         else{
                              $avg = round($total_star/$total_review);
                         }
                     @endphp
               <div class="col-lg-6">
                    <div class="slider-for">
                         @foreach ($all_thumbnails as $thumbnail)
                         
                         <div class="product"><img src="{{asset('uploads/product/thumbnail')}}/{{$thumbnail->thumbnail}}" alt=""></div>
                         @endforeach
                    </div>
                    <div class="slick_details">
                         @foreach ($all_thumbnails as $thumbnail)
                         <div class="product_short"><img src="{{asset('uploads/product/thumbnail')}}/{{$thumbnail->thumbnail}}" alt=""></div>
                         @endforeach
                    </div>
               </div>
               <div class="col-lg-6">
                    <div class="shop_details_text">
                         <h3>{{$all_slugs->first()->product_name}}</h3>
                         <p>{{$all_slugs->first()->short_desp}}</p>
                         <ul>
                              @for ($i=1;$i<=$avg; $i++)
                                    <li><i class="fa-solid fa-star"></i></li>
                               @endfor
                         </ul>
                         <strong>{{$avg}} Ratings</strong>
                         <br>
                         <strong>Price TK :</strong><h4 class="total">{{$all_slugs->first()->after_discount}}</h4>
                         @if ($all_slugs->first()->product_discount)
                              <del>TK {{$all_slugs->first()->product_price}} </del>
                            @else

                         @endif
                         
                    </div>
                    <form action="{{route('cart.store')}}" method="POST">
                         @csrf
                    <div class="row">
                         <div class="col-lg-6">
                              <div class="size">
                                   <h3>Color*</h3>
                              </div>
                              <input type="hidden" name="product_id" value="{{$all_slugs->first()->id}}">
                              <div class="select">
                                   <select name="color_id" id="color_id" class="form-select">
                                        <option selected value=""> -- Please Select -- </option>
                                        @foreach ($available_color as $color)
                                             
                                        <option value="{{$color->rel_to_color->id}}">{{$color->rel_to_color->color_name}}</option>
                                        @endforeach
                                   </select>
                              </div>
                         </div>
                         <div class="col-lg-6">
                              <div class="size">
                                   <h3>Size*</h3>
                              </div>
                              <div class="select">
                                   <select name="size_id" id="size_id" class="form-select">
                                        <option selected> -- Select Size -- </option>
                                        
                                   </select>
                              </div>
                         </div>
                         <div class="col-lg-6">
                              <div class="quantity">
                                   <button type="button" id="minus"><i class="fa-solid fa-minus"></i></button>
                                        <input class="quantity_number" readonly type="text" name="quantity" value="1">
                                   <button type="button" id="plus"><i class="fa-solid fa-plus"></i></button>
                              </div>
                         </div>
                         <div class="col-lg-6">
                              <div class="total_price">
                                   <strong>Total TK: </strong><h4 class="total_amount">{{$all_slugs->first()->after_discount}}</h4>
                              </div>
                         </div>
                    </div>
                    @auth('customerlogin')
                    <button type="submit" class="btn btn-danger mt-5">Add to Cart</button>
                    @else   
                    <div class="add_Cart">
                         <a href="{{route('customer.login')}}">Add to Cart</a>
                    </div> 
                    @endauth
               </form>
               
               </div>
             </div>
          </div>
     </section>
     <!-- Shop Details HTML End -->
     <!-- Shop Description Page HTML Start -->
     <section id="shop_description">
          <div class="container">
               <div class="row">
                    <div class="col-lg-12">
                         <div class="shop_desp_area">
                           
                              <p>
                                   <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        Description
                                   </button>
                                   <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExamplee"
                                        aria-expanded="false" aria-controls="collapseExamplee">
                                        Additional Information
                                   </button>
                                   <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3"
                                        aria-expanded="false" aria-controls="collapseExample3">
                                        Reviews ({{$total_review}})
                                   </button>
                              </p>
                              <div class="collapse" id="collapseExample">
                                   <div class="card card-body">
                                             <h6>{!!$all_slugs->first()->long_desp!!}</h6>
                                   </div>
                              </div>
                              <div class="collapse" id="collapseExamplee">
                                   <div class="card card-body">
                                             <h6>Return into stiff sections the bedding was hardly able to cover it and seemed ready to slide off any moment. His many
                                             legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked what's happened to
                                             me he thought It wasn't a dream. His room, a proper human room although a little too small
                                             Additional Info
                                             
                                             No Side Effects
                                             Made in USA
                                             
                                             Product Features Info
                                             
                                             Compatible for indoor and outdoor use
                                             Wide polypropylene shell seat for unrivalled comfort
                                             Rust-resistant frame
                                             Durable UV and weather-resistant construction
                                             Shell seat features water draining recess
                                             Shell and base are stackable for transport
                                             Choice of monochrome finishes and colourways
                                             Designed by Nagi
                                        </h6>
                                   </div>
                              </div>
                              <div class="collapse" id="collapseExample3">
                                   <div class="card card-body m-auto">
                                        <div class="top_review">
                                             <ul>
                                                  @for ($i=1;$i<=$avg; $i++)
                                                       <li><i class="fa-solid fa-star"></i></li>
                                                  @endfor
                                             </ul>
                                             <h3>Average Star Rating: {{$avg}} out of 5 ({{$total_review}} vote)</h3>
                                        </div>
                                        <div class="middle_review">
                                             <h3>{{$total_review}} reviews for this product</h3>
                                             @foreach ($reviews as $review)
                                                 
                                             <div class="middle_part">
                                                  <div class="row">
                                                       <div class="col-lg-1">
                                                            <div class="middle_review_img">
                                                                 <img src="{{asset('frontend/images/team_1.jpg')}}" alt="">
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-6">
                                                            <div class="middle_review_text">
                                                                 <ul>
                                                                      @for ($i=1; $i<=$review->star; $i++)
                                                                        <li><i class="fa-solid fa-star"></i></li>
                                                                      @endfor
                                                                 </ul>
                                                                 <h3>{{$review->rel_to_customer->name}}</h3>
                                                                 <strong>{{$review->created_at->format('d-m-Y')}}</strong>
                                                                 <p>{{$review->review}}</p>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                              
                                             @endforeach
                                        </div>
                                        @auth('customerlogin')
                                        @if (App\Models\OrderProduct::where('customer_id',Auth::guard('customerlogin')->id())->where('product_id',$all_slugs->first()->id)->exists())

                                        @if (App\Models\OrderProduct::where('customer_id',Auth::guard('customerlogin')->id())->where('product_id',$all_slugs->first()->id)->where('review', '!=', null)->first() == false)
                                        <div class="middle_review">
                                             <h3>Add a review</h3>
                                             <div class="middle_part">
                                                  <div class="row">
                                                       <div class="col-lg-12">
                                                            <form action="{{route('review')}}" method="POST">
                                                                 @csrf
                                                                 <div class="review_box">
                                                                      <input type="text" class="form-control" name="name" id="name" value="{{Auth::guard('customerlogin')->user()->name}}">
                                                                 </div>
                                                                 <div class="review_box">
                                                                      <input type="email" class="form-control" name="email" id="email" value="{{Auth::guard('customerlogin')->user()->email}}">
                                                                 </div>
                                                                 <div class="review_box">
                                                                     <h3>Your Rating :</h3>
                                                                     <ul>
                                                                      <li><button class="star" type="button" value="1"><i class="fa-solid fa-star"></i></button></li>
                                                                      <li><button class="star" type="button" value="2"><i class="fa-solid fa-star"></i></button></li>
                                                                      <li><button class="star" type="button" value="3"><i class="fa-solid fa-star"></i></button></li>
                                                                      <li><button class="star" type="button" value="4"><i class="fa-solid fa-star"></i></button></li>
                                                                      <li><button class="star" type="button" value="5"><i class="fa-solid fa-star"></i></button></li>
                                                                     </ul>
                                                                 </div>
                                                                 <input type="hidden" id="star" value="" name="star">
                                                                 <input type="hidden" value="{{$all_slugs->first()->id}}" name="product_id">
                                                                 <div class="review_box">
                                                                     <textarea name="review" id="message" class="form-control" placeholder="Your Review"></textarea>
                                                                 </div>
                                                                 <div class="review_box">
                                                                     <button class="btn btn-danger" type="submit">Submit</button>
                                                                 </div>
                                                            </form>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                         @else
                                            <div class="alert alert-warning">
                                                <h3>Already You Reviewed This Product</h3>
                                             </div> 
                                        @endif

                                        @else
                                            <div class="alert alert-warning">
                                                <h3>You Don't Puschase Yet</h3>
                                             </div> 
                                        @endif

                                        @else
                                            <div class="alert alert-info">
                                                <h3>Please Signin To Review This Product  <a class="btn btn-danger float-end" href="{{route('customer.login')}}">Sign In</a></h3>
                                             </div> 
                                        @endauth
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <!-- Shop Description Page HTML End -->
     <!-- Related Product HTML Start -->
     <section id="related_product">
          <div class="container">
               <div class="row">
                    <div class="col-lg-6">
                         <div class="category_head_text">
                              <h3>Related Products <i class="fa-solid fa-leaf"></i></h3>
                              <p class="mb-5">A virtual assistant collects the products from your list</p>
                         </div>
                    </div>
               </div>
               <div class="row">
                    @forelse ($related_products as $related)
                        <div class="col-lg-3">
                              <div class="fruit_box">
                                   <img src="{{asset('uploads/product/preview')}}/{{$related->preview}}" alt="capsicum">
                                   <h4>{{$related->product_name}}</h4>
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
                                   <h5>{{$related->after_discount}} TK</h5>
                                   <span><a href="{{route('product.details',$related->slug)}}">Add Cart <i class="fa-solid fa-cart-plus"></i></a></span>
                              </div>
                         </div>
                         @empty
                         <h3>No Related Prodcut Found</h3>
                    @endforelse
               </div>
          </div>
     </section>
     <!-- Related Product HTML End -->
@endsection
@section('footer_script')
<script>
     $(".star").click(function(){
          var star = $(this).val();
          $('#star').val(star);
     });
</script>
<script>
     $('#color_id').change(function(){
          var color_id = $(this).val();
          var product_id = "{{$all_slugs->first()->id}}";

           $.ajaxSetup({
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
          });
          $.ajax({
               type:'POST',
               url:'/getsize',
               data:{'color_id':color_id,'product_id':product_id},
               success:function(data){
                   $('#size_id').html(data);
               }
          });
     });
</script>
<script>
     
      var quantity = $(".quantity_number").val();
     $('#plus').click(function () {
     quantity++;
     $(".quantity_number").val(quantity);
     var price = $('.total').html();
     var total = price * quantity;
     $(".total_amount").html(total);
     });
     $("#minus").click(function () {
     if (quantity > 1) {
     
     quantity--;
     }
     $(".quantity_number").val(quantity);
     var price = $(".total").html();
     var total = price * quantity;
     $(".total_amount").html(total);
     });
</script>
@if (session('cart'))
<script>
     Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '{{session('cart')}}',
  showConfirmButton: false,
  timer: 1500
})
</script>

@endif
@endsection