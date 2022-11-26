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
                                        <h3>Checkout Page</h3>
                                   </div>
                                   <div class="col-lg-6">
                                        <div class="breadcrumb_link">
                                             <ul>
                                                  <li><a href="index.html"><i class="fa-solid fa-house-chimney"></i> Go Home</a>
                                                  </li>
                                                  <li><a href="shop_details.html"><i class="fa-solid fa-basket-shopping"></i> Go Shope
                                                            Page</a></li>
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
     <!-- Checkout HTML Start -->
     <section id="checkout">
          <div class="container">
               <div class="checkout_details">
                   <form action="{{route('order.store')}}" method="POST">
                    @csrf
                     <div class="row">
                         <div class="col-lg-8">
                              <div class="personal_details">
                                   <h3>Belling Details</h3>
                              </div>
                              <div class="row">
                                   <div class="col-lg-6">
                                        <div class="form_box">
                                             <label for="" class="form-label">First Name</label>
                                             <input type="text" class="form-control" name="name" value="{{Auth::guard('customerlogin')->user()->name}}">
                                             <input type="hidden" class="form-control" name="customer_id" value="{{Auth::guard('customerlogin')->user()->id}}">
                                        </div>
                                   </div>
                                   <div class="col-lg-6">
                                        <div class="form_box">
                                             <label for="" class="form-label">Email</label>
                                             <input type="email" class="form-control" name="email" value="{{Auth::guard('customerlogin')->user()->email}}">
                                        </div>
                                   </div>
                                   <div class="col-lg-6">
                                        <div class="form_box">
                                             <label for="" class="form-label">Company Name</label>
                                             <input type="text" class="form-control" name="company">
                                        </div>
                                   </div>
                                   <div class="col-lg-6">
                                        <div class="form_box">
                                             <label for="" class="form-label">Mobile</label>
                                             <input type="text" class="form-control" name="mobile">
                                        </div>
                                   </div>
                                   @error('mobile')
                                        <strong class="text-danger">{{$message}}</strong>
                                   @enderror
                                   <div class="col-lg-6">
                                        <div class="form_box">
                                             <label for="" class="form-label">Country</label>
                                             <select name="country" id="country_id" class="form-control">
                                                  <option value="0">-- Select Country --</option>
                                                  @foreach ($all_countries as $country)
                                                  <option value="{{$country->id}}">{{$country->name}}</option>
                                                  @endforeach
                                             </select>
                                        </div>
                                   </div>
                                   <div class="col-lg-6">
                                        <div class="form_box">
                                             <label for="" class="form-label">City</label>
                                             <select name="city" id="city_id" class="form-control">
                                                  <option value="0">-- Select City --</option>
                                                  <option value="1">Dhaka</option>
                                                  <option value="2">Chattogram</option>
                                                  <option value="3">Sylhet</option>
                                                  <option value="4">Rajshahi</option>
                                                  <option value="5">Mymensingh</option>
                                             </select>
                                        </div>
                                   </div>
                                   <div class="col-lg-12">
                                        <div class="form_box">
                                             <label for="" class="form-label">Address</label>
                                             <input type="text" class="form-control" placeholder="Street Address" name="address">
                                        </div>
                                   </div>
                                   @error('address')
                                        <strong class="text-danger">{{$message}}</strong>
                                   @enderror
                                   <div class="col-lg-12">
                                        <div class="form_box">
                                             <label for="" class="form-label">Order Notes</label>
                                             <input type="text" class="form-control" placeholder="Notes About Your Order ..." name="notes">
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="right_order_part">
                                   <h3>Your Order</h3>
                              </div>
                              <div class="right_order_table">
                                   <table class="table">
                                        @php
                                             $subtotal = 0;
                                             foreach(App\Models\Cart::where('customer_id', Auth::guard('customerlogin')->id())->get() as $cart){
                                                  $subtotal += $cart->rel_to_product->after_discount * $cart->quantity;
                                             }
                                        @endphp
                                        <tr>
                                             <th>SubTotal</th>
                                             <td>TK {{$subtotal}}</td>
                                        </tr>
                                        <tr>
                                             <th>Discount</th>
                                             <td>TK {{session('discount_final')}}</td>
                                        </tr>
                                        <tr>
                                             <th>Delivery Charge</th>
                                             <td> 
                                                  <input type="hidden" id="delivary_chtarge" name="subtotal" value="{{$subtotal}}">
                                                  <input type="hidden" id="delivary_chtarge" name="discount" value="{{session('discount_final')}}">
                                                  <input type="radio" class="delivary_btn" name="delivary" value="100"> Insite City
                                                  <br>
                                                  <input type="radio" class="delivary_btn" name="delivary" value="200"> Outsite City
                                             </td>
                                             @error('delivary')
                                                  <strong class="text-danger">{{$message}}</strong>
                                             @enderror
                                        </tr>
                                        <tr>
                                             <th>Total</th>
                                             <td>TK <strong id="total">{{$subtotal - session('discount_final')}}</strong></td>
                                        </tr>
                                   </table>
                              </div>
                              <div class="order_process_part">
                                   <input type="radio" id="cash" name="payment_method" value="1">
                                   <label for="cash">Cash On Delivery</label><br>
                                   <input type="radio" id="ssl" name="payment_method" value="2">
                                   <label for="ssl">SSL Commerz</label><br>
                                   <br>
                                   @error('payment_method')
                                         <strong class="text-danger">{{$message}}</strong>
                                   @enderror
                                   <div class="place_order">
                                        <button type="submit" class="btn btn-danger">Place Order</button>
                                   </div>
                              </div>
                         </div>
                    </div>
                   </form>
               </div>
          </div>
     </section>
     <!-- Checkout HTML End -->
@endsection
@section('footer_script')
<script>
    $('#country_id').change(function(){
       var country_id = $(this).val();

     $.ajaxSetup({
    headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
     });
     $.ajax({
          type:'POST',
          url:'/getcity',
          data:{'country_id':country_id},
          success:function(data){
               $('#city_id').html(data);
          }
     });

    })
</script>
<script>
     $(document).ready(function() {
          $('#country_id').select2();
     });
     $(document).ready(function() {
          $('#city_id').select2();
     });
</script>
<script>
     $('.delivary_btn').click(function(){
          var charge = parseInt($(this).val());
          var total = parseInt($('#delivary_chtarge').val());
          var final_total = charge + total;
          $('#total').html(final_total);
     })
</script>
@endsection