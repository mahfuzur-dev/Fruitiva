@extends('frontend.master')
@section('content')
      <!-- Banner HTML Start -->
     <section id="banner">
          <div class="container">
               <div class="row">
                    <div class="col-lg-8">
                         <div class="banner_left">
                              <div class="banner_left_text">
                                   <h6>Exclusive offer <span>30% Off</span></h6>
                                   <h2>Stay home & <br> delivered your <br><span>DAILY NEEDS</span></h2>
                                   <p>Many organizations have issued official <br> statements encouraging people to reduce their <br> intake of sugary drinks.</p>
                                   <a href="{{route('shop')}}">Shop Now <i class="fa-solid fa-arrow-right"></i></a>
                              </div>
                         </div>
                    </div>
                    <div class="col-lg-4">
                         <div class="banner_right">
                              <h2>45% <span>OFF</span></h2>
                              <h3>Real <br> Refresement</h3>
                              <h5>Only this Week, <br> Don't Miss ...</h5>
                              <a href="{{route('shop')}}">Shop Now <i class="fa-solid fa-arrow-right"></i></a>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <!-- Banner HTML End -->
     <!-- Browse By Fruits & Vegetables HTML Start -->
     <section id="browse_fruits">
          <div class="container">
               <div class="row">
                    <div class="col-lg-6">
                         <div class="category_head_text">
                              <h3>FRUIT & VEGETABLES <i class="fa-solid fa-leaf"></i></h3>
                              <p>A virtual assistant collects the products from your list</p>
                         </div>
                    </div>
               </div>
               <div class="row">
                    @foreach ($all_product as $product)
                        <div class="col-lg-3">
                              <div class="fruit_box">
                                   <img src="{{asset('uploads/product/preview')}}/{{$product->preview}}" alt="capsicum">
                                   @if ($product->product_discount)
                                   <strong>{{$product->product_discount}} % Off</strong>
                                   @endif
                                   <div class="fruit_text_box">
                                        <h4>{{$product->product_name}}</h4>
                                        <p>{{$product->short_desp}}</p>
                                   </div>
                                   <br>
                                   <h5 class="mt-3">{{$product->after_discount}} TK</h5>
                                   <span><a href="{{route('product.details',$product->slug)}}">Add Cart <i class="fa-solid fa-cart-plus"></i></a></span>
                              </div>
                         </div>
                    @endforeach
               </div>
          </div>
     </section>
     <!-- Browse By Fruits & Vegetables HTML End -->
     <!-- Top Category HTML Start -->
     <section id="top_category">
          <div class="container">
               <div class="row">
                    <div class="col-lg-6">
                         <div class="category_head_text">
                              <h3>Top Category <i class="fa-solid fa-leaf"></i></h3>
                              <p class="mb-5">A virtual assistant collects the products from your list</p>
                         </div>
                    </div>
               </div>
               <div class="slick_item">
                    @foreach ($all_categories as $category)
                         <div class="top_cat_box m-auto text-center">
                              <img src="{{asset('uploads/category')}}/{{$category->category_image}}" alt="">
                              <h3>{{$category->category_name}}</h3>
                         </div>
                    @endforeach
               </div>
          </div>
     </section>
     <!-- Top Category HTML End -->
     
     <!-- Browse Offer HTML Start -->
     <section id="offer_browse">
          <div class="container">
               <div class="row">
                    <div class="col-lg-12 text-center">
                         <div class="browse_offer">
                             <div class="overlay">
                                   <h2>Get 100 TK Off Cashback! Min Order of Tk 350 </h2>
                                   <h5>Use Code : Fruitiva100</h5>
                             </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <!-- Browse Offer HTML End -->

     <!-- Recent Add HTML Start -->
     <section id="recent_add">
          <div class="container">
               <div class="row">
                    <div class="col-lg-4">
                         <div class="recent_head">
                              <h3>Top Selling</h3>
                         </div>
                         @foreach ($best_selling as $best)
                              <div class="recent_selling">
                              <div class="row">
                                   <div class="col-lg-4">
                                        <div class="recent_img">
                                             <img src="{{asset('uploads/product/preview')}}/{{$best->rel_to_product->preview}}" alt="recent">
                                        </div>
                                   </div>
                                   <div class="col-lg-8">
                                        <div class="recent_text">
                                             <h4>{{$best->rel_to_product->product_name}}</h4>
                                             <p>{{$best->rel_to_product->short_desp}}</p>
                                             <h5>{{$best->rel_to_product->after_discount}} TK</h5>
                                        </div>
                                   </div>
                              </div>
                              </div>
                         @endforeach
                    </div>
                    <div class="col-lg-4">
                         <div class="recent_head">
                              <h3>Recently View</h3>
                         </div>
                         @foreach ($all_recent_product as $recent)
                             <div class="recent_selling">
                              <div class="row">
                                   <div class="col-lg-4">
                                        <div class="recent_img">
                                             <img src="{{asset('uploads/product/preview')}}/{{$recent->preview}}" alt="recent">
                                        </div>
                                   </div>
                                   <div class="col-lg-8">
                                        <div class="recent_text">
                                             <h4>{{$recent->product_name}}</h4>
                                             <p>{{$recent->short_desp}}</p>
                                             <h5>{{$recent->after_discount}} TK</h5>
                                        </div>
                                   </div>
                              </div>
                              </div>
                          @endforeach
                    </div>
                    <div class="col-lg-4">
                         <div class="recent_head">
                              <h3>Trending Products</h3>
                         </div>
                         @foreach ($all_tranding as $trand)
                             <div class="recent_selling">
                              <div class="row">
                                   <div class="col-lg-4">
                                        <div class="recent_img">
                                             <img src="{{asset('uploads/product/preview')}}/{{$trand->preview}}" alt="recent">
                                        </div>
                                   </div>
                                   <div class="col-lg-8">
                                        <div class="recent_text">
                                             <h4>{{$trand->product_name}}</h4>
                                             <p>{{$trand->short_desp}}</p>
                                             <h5>{{$trand->after_discount}} TK</h5>
                                        </div>
                                   </div>
                              </div>
                               </div>
                         @endforeach
                    </div>
               </div>
          </div>
     </section>
     <!-- Recent Add HTML End -->
        
     <!-- Feature Blog HTML Start -->
     <section id="blog">
          <div class="container">
               <div class="row">
                    <div class="col-lg-6">
                         <div class="category_head_text">
                              <h3>Featured Blog <i class="fa-solid fa-leaf"></i></h3>
                              <p>A virtual assistant collects the products from your list</p>
                         </div>
                    </div>
               </div>
               <div class="row">
                    <div class="col-lg-3">
                         <div class="blog_box">
                              <div class="blog_img">
                                   <img src="{{asset('/frontend/images/organic_vegetable.jpg')}}" alt="organic">
                              </div>
                              <p>Formart</p>
                              <h4>Fresh Organic Vegetables</h4>
                         </div>
                    </div>
                    <div class="col-lg-3">
                         <div class="blog_box">
                              <div class="blog_img">
                                   <img src="{{asset('/frontend/images/blog_two.jpg')}}" alt="organic">
                              </div>
                              <p>Beer Brand</p>
                              <h4>Cold Drinks 500 ml</h4>
                         </div>
                    </div>
                    <div class="col-lg-3">
                         <div class="blog_box">
                              <div class="blog_img">
                                   <img src="{{asset('/frontend/images/blog_three.jpg')}}" alt="organic">
                              </div>
                              <p>Formart</p>
                              <h4>Fresh Meat Suagage</h4>
                         </div>
                    </div>
                    <div class="col-lg-3">
                         <div class="blog_box">
                              <div class="blog_img">
                                   <img src="{{asset('/frontend/images/burger.jpg')}}" alt="organic">
                              </div>
                              <p>Crispy</p>
                              <h4>Good Life Muffet Burger Bun</h4>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <!-- Feature Blog HTML End -->
@endsection