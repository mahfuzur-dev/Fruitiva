<!DOCTYPE html>
<html lang="en">

<head>
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>FRUITIVA</title>
     <link rel="shortcut icon" href="{{asset('/frontend/images/logo.png')}}" type="image/x-icon">
     <!-- GOOGLE FONTS -->
     <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
     <!-- CSS LINK -->
     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     <link rel="stylesheet" href="{{asset('/frontend/css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('/frontend/css/all.min.css')}}">
     <link rel="stylesheet" href="{{asset('/frontend/css/slick.css')}}">
     <link rel="stylesheet" href="{{asset('/frontend/css/style.css')}}">
     <link rel="stylesheet" href="{{asset('/frontend/css/responsive.css')}}">
</head>

<body>
     <!-- TOP Header HTML START -->
     <section id="header_top_area">
          <div class="container">
               <div class="row">
                    <div class="col-lg-7">
                         <div class="timer_notification">
                              <h6>Welcome to Fruitiva! <a href="{{route('shop')}}}"><i class="fa-solid fa-cart-arrow-down"></i> Buy
                                        Now</a></h6>
                         </div>
                    </div>
                    <div class="col-lg-3">
                         <div class="company_email">
                              <a href="mailto:fruitiva2022@gmail.com"><i
                                        class="fa-solid fa-envelope-open-text"></i>fruitiva2022@gmail.com</a>
                         </div>
                    </div>
                    <div class="col-lg-2">
                         <div class="dropdown me-auto">
                              <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                   Select Country
                              </a>

                              <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="#"><img src="{{asset('/frontend/images/bangladesh.png')}}"
                                                  alt="">Bangladesh</a></li>
                                   <li><a class="dropdown-item" href="#"><img src="{{asset('/frontend/images/united-kingdom.png')}}"
                                                  alt="">UK</a></li>
                                   <li><a class="dropdown-item" href="#"><img src="{{asset('/frontend/images/india.png')}}" alt="">India</a>
                                   </li>
                                   <li><a class="dropdown-item" href="#"><img src="{{asset('/frontend/images/japan.png')}}" alt="">Japan</a>
                                   </li>
                              </ul>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <!-- TOP Header HTML End -->
     <!-- Header HTML Start -->
     <section id="header_area">
          <div class="container">
               <div class="row">
                    <div class="col-lg-2">
                         <div class="logo">
                              <a href="#"><img src="{{asset('/frontend/images/Triphography.png')}}" alt="logo"></a>
                         </div>
                    </div>
                    <div class="col-lg-4">
                         <div class="search_area">
                              <input type="search" id="search_input" name="search" class="form-control" placeholder="I'm Search for ....">
                              <button type="submit" class="search_btn" value="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                         </div>
                    </div>
                    <div class="col-lg-6">
                         <nav class="navbar navbar-expand-lg">
                              <div class="container">
                                   <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                   </button>
                                   <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav">
                                             <li class="nav-item">
                                                  <a class="nav-link" aria-current="page" href="{{route('frontend')}}">Home</a>
                                             </li>
                                             <li class="nav-item">
                                                  <a class="nav-link" href="{{route('shop')}}">Shop</a>
                                             </li>
                                             <li class="nav-item">
                                                  <a class="nav-link" href="{{route('shop')}}">Product</a>
                                             </li>
                                             <li class="nav-item">
                                                  <a class="nav-link" href="#">About</a>
                                             </li>
                                             <li class="nav-item">
                                                  <a class="nav-link" href="#">Blog</a>
                                             </li>
                                             <li class="nav-item">
                                                  <a class="nav-link" href="#">Contact</a>
                                             </li>
                    
                                        </ul>
                                   </div>
                              </div>
                         </nav>
                    </div>
               </div>
          </div>
     </section>
     <!-- Header HTML End -->
     <!-- Navbar HTML Start -->
     <Section id="navbar_area">
          <div class="container">
               <div class="row">
                    <div class="col-lg-3">
                         <div class="navbar_left">
                               <h3><i class="fa-solid fa-bars-staggered"></i>All Categories</h3>
                              <div class="sub_nabar_left">
                                   <ul>
                                        @foreach (App\Models\Category::all() as $category)
                                             
                                        <li><a href="#">{{$category->category_name}}</a></li>
                                        @endforeach
                                   </ul>
                              </div>
                          </div>
                    </div>
                    <div class="col-lg-9">
                         <div class="rightside_box">
                              <ul>
                                   <li><a href="#"><i class="fa-solid fa-phone"></i></a></li>
                                   <li><a href="#"><i class="fa-regular fa-heart"></i></a></li>
                                   <li>
                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><i class="fa-solid fa-cart-plus">
                                             </i>
                                             <div class="order_shape">
                                                  <p>{{App\Models\Cart::where('customer_id',Auth::guard('customerlogin')->id())->count()}}</p>
                                             </div>
                                        </a>
                    
                                             <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                                  aria-hidden="true">
                                                  <div class="modal-dialog">
                                                       <div class="modal-content">
                                                            <div class="modal-header">
                                                                 <h3 class="modal-title fs-5" id="exampleModalLabel">Cart View</h3>
                                                                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                      aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                 <div class="row">
                                                                      @php
                                                                           $subtotal = 0;
                                                                      @endphp
                                                                      @foreach (App\Models\Cart::where('customer_id',Auth::guard('customerlogin')->id())->get() as $cart)
                                                                           
                                                                      <div class="col-lg-12">
                                                                           <div class="modal_main">
                                                                                <div class="row">
                                                                                     <div class="col-lg-2">
                                                                                          <div class="order_pro_img">
                                                                                               <img src="{{asset('uploads/product/preview')}}/{{$cart->rel_to_product->preview}}"
                                                                                                    alt="">
                                                                                          </div>
                                                                                     </div>
                                                                                     <div class="col-lg-8">
                                                                                          <div class="order_pro_name">
                                                                                               <h3>{{$cart->rel_to_product->product_name}}</h3>
                                                                                               <strong>{{$cart->quantity}} X TK{{$cart->rel_to_product->after_discount}}</strong>
                                                                                          </div>
                                                                                     </div>
                                                                                     <div class="col-lg-2">
                                                                                          <div class="delete_icon">
                                                                                               <a href="{{route('remove.cart',$cart->id)}}"><i class="fa-regular fa-trash-can"></i></a>
                                                                                          </div>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                      @php
                                                                           $subtotal += $cart->rel_to_product->after_discount * $cart->quantity;
                                                                      @endphp
                                                                      @endforeach
                                                                 </div>
                                                                 <div class="grand_total">
                                                                      <div class="row">
                                                                           <div class="col-lg-6">
                                                                                <div class="total_part">
                                                                                     <h3>Sub-Total:</h3>
                                                                                </div>
                                                                           </div>
                                                                           <div class="col-lg-6">
                                                                                <div class="total_price_grand">
                                                                                     <strong>TK {{$subtotal}}</strong>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="modal_footer">
                                                                      <ul>
                                                                           <li><strong><a href="{{route('cart')}}">View Cart</a></strong></li>
                                                                           <li><strong><a href="{{route('checkout')}}">Checkout</a></strong></li>
                                                                      </ul>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                   </li>
                                   <li><a href="#"><i class="fa-regular fa-user"></i></a>
                                        <div class="sub_box_title">
                                             <ul> 
                                                  @auth('customerlogin')
                                                       <li><a href="{{route('account')}}"><i class="fa-solid fa-address-card"></i> {{Auth::guard('customerlogin')->user()->name}}</a></li>
                                                       @else

                                                       <li><a href="{{route('customer.login')}}"><i class="fa-solid fa-right-to-bracket"></i> Log in</a></li>
                                                       <li><a href="{{route('customer.register')}}"><i class="fa-solid fa-right-from-bracket"></i> Register</a></li>
                                                  @endauth
                                                  <li><a href="{{route('customer.logout')}}"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a></li>
                                             </ul>
                                        </div>
                                   </li>
                              </ul>
                         </div>
                    </div>
                  
               </div>
          </div>
     </Section>
     <!-- Navbar HTML End -->
    
     @yield('content')
     <!-- NewsLetter HTML Start -->
     <section id="newsletter">
          <div class="container">
               <div class="newsletter_cover">
                    <div class="row">
                         <div class="col-lg-6 ms-auto">
                              <div class="newsletter_text">
                                   <h3>Join Our Newsletter And Get...</h3>
                                   <h6>TK 200 discount for your first order</h6>
                                   <div class="input_box">
                                        <form action="">
                                             <input type="email" placeholder="Enter Your Email">
                                             <i class="fa-regular fa-envelope"></i>
                                             <button type="submit">Subscribe</button>
                                        </form>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <!-- NewsLetter HTML End -->
     <!-- Footer HTML End -->
     <section id="footer">
          <div class="container">
               <div class="footer_border">
                    <div class="row">
                         <div class="col-lg-3">
                              <div class="footer_head">
                                   <img src="{{asset('/frontend/images/Triphography.png')}}" alt="">
                                   <p>We are a friendly bar serving a variety of cocktails, wines and beers. Our bar is a perfect place for
                                        a couple.</p>
                                   <ul>
                                        <li><a href="#"><i class="fa-solid fa-house"></i>194, CA/ Uttar Badda, Dhaka-1212</a></li>
                                        <li><a href="#"><i class="fa-regular fa-envelope"></i>info2022@gmail.com</a></li>
                                   </ul>
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="footer_head">
                                   <h3>Useful Links</h3>
                                   <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Shop</a></li>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Contact US</a></li>
                                   </ul>
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="footer_head">
                                   <h3>Help Center</h3>
                                   <ul>
                                        <li><a href="#">Your Order</a></li>
                                        <li><a href="#">Your Account</a></li>
                                        <li><a href="#">Track Order</a></li>
                                        <li><a href="#">Search</a></li>
                                        <li><a href="#">FAQ</a></li>
                                   </ul>
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="footer_head">
                                   <h3>Contact Us</h3>
                              </div>
                              <div class="contact_footer_part">
                                   <div class="row">
                                        <div class="col-lg-2">
                                             <div class="footer_contact_icon">
                                                  <i class="fa-solid fa-phone"></i>
                                             </div>
                                        </div>
                                        <div class="col-lg-10">
                                             <div class="footer_contact_text">
                                                  <h6>Hotline 24/7 :</h6>
                                                  <h4>+880123456789</h4>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="contact_footer_part">
                                   <div class="row">
                                        <div class="col-lg-2">
                                             <div class="footer_contact_icon">
                                                  <i class="fa-solid fa-envelope"></i>
                                             </div>
                                        </div>
                                        <div class="col-lg-10">
                                             <div class="footer_contact_text">
                                                  <h6>Email Address</h6>
                                                  <h4>info2022@gmail.com</h4>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="app_dowload">
                                   <h4>Download App:</h4>
                                   <ul>
                                        <li><a href="#"><img src="{{asset('/frontend/images/google_app.png')}}" alt="app"></a></li>
                                        <li><a href="#"><img src="{{asset('/frontend/images/app.png')}}" alt="app"></a></li>
                                   </ul>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <!-- Footer HTML End -->
     <!-- Footer Bottom HTML End -->
     <section id="footer_bottom">
          <div class="container">
               <div class="row">
                    <div class="col-lg-6 text-center">
                        <div class="footer_bottom_left">
                              <p>&#169; 2022 Fruitiva All rights reserved</p>
                        </div>
                    </div>
                    <div class="col-lg-6 ms-auto">
                         <div class="footer_bottom_right">
                              <ul>
                                   <li><a href="#"><img src="{{asset('/frontend/images/paypal.png')}}" alt=""></a></li>
                                   <li><a href="#"><img src="{{asset('/frontend/images/visa card.png')}}" alt=""></a></li>
                                   <li><a href="#"><img src="{{asset('/frontend/images/master.png')}}" alt=""></a></li>
                                   <li><a href="#"><img src="{{asset('/frontend/images/stirpe.png')}}" alt=""></a></li>
                              </ul>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <!-- Footer Bottom HTML End -->

     <!--Back-To-Top Html-->
     <div class="dark">
          <img src="{{asset('/frontend')}}/images/night_mood.png" alt="" id="icon">
     </div>
     <div class="back-to-top">
          <i class="fa-sharp fa-solid fa-arrow-up"></i>
     </div>
     <!--Back-To-Top Html-->

     <!-- JS lINK -->
     <script src="{{asset('/frontend/js/jquery-1.12.4.min.js')}}"></script>
     <script src="{{asset('/frontend/js/bootstrap.bundle.min.js')}}"></script>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
     <script src="{{asset('/frontend/js/slick.min.js')}}"></script>
     <script src="{{asset('/frontend/js/custom.js')}}"></script>
     <!-- JS lINK -->
     @yield('footer_script');
     <script>
          @if (session('cart_del'))
                
               Swal.fire({
               title: 'Are you sure?',
               text: "You won't be able to revert this!",
               icon: 'warning',
               confirmButtonColor: '#3085d6',
               confirmButtonText: 'Yes, delete it!'
               }).then((result) => {
               if (result.isConfirmed) {
               Swal.fire(
                    'Deleted!',
                    '{{session('cart_del')}}',
                    'success'
               )
               }
               })
          @endif
     </script>
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
     </script>
</body>

</html>
