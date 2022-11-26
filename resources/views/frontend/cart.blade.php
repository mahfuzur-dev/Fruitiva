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
                                        <h3>Cart Page</h3>
                                   </div>
                                   <div class="col-lg-6">
                                        <div class="breadcrumb_link">
                                             <ul>
                                                  <li><a href="{{route('frontend')}}"><i class="fa-solid fa-house-chimney"></i> Go Home</a></li>
                                                  <li><a href=""><i class="fa-solid fa-basket-shopping"></i> Go Shope
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
     <!-- cart_details part HTML Start -->
     <section id="cart_detaials">
          <div class="container">
               <table class="table">
                         <tr class="t-head m-auto text-center">
                              <th>Product</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <th>Total</th>
                              <th>Remove</th>
                         </tr>
                         @php
                              $subtotal = 0;
                         @endphp
                         @foreach ($carts as $cart)
                              
                         <tr class="t-body m-auto text-center">
                              <td class="table_items">
                                   <img src="{{asset('uploads/product/preview')}}/{{$cart->rel_to_product->preview}}" alt="">
                                   <h4>{{$cart->rel_to_product->product_name}}</h4>
                              </td>
                              <td class="table_items abc">
                                   <strong>TK {{$cart->rel_to_product->after_discount}}</strong>
                              </td>
                              <form action="{{route('update.cart')}}" method="POST">
                                   @csrf
                              <td class="table_items abc">
                                   <button type="button"><i data-price="{{$cart->rel_to_product->after_discount}}" class="fa-solid fa-minus"></i></button>
                                   <input type="text" readonly name="quantity[{{$cart->id}}]" value="{{$cart->quantity}}">
                                   <button type="button"><i data-price="{{$cart->rel_to_product->after_discount}}" class="fa-solid fa-plus"></i></button>
                              </td>
                              <td class="table_items abc">
                                   <strong>Tk {{$cart->rel_to_product->after_discount * $cart->quantity}}</strong>
                              </td>
                              <td class="table_items abc">
                                   <a href="{{route('remove.cart',$cart->id)}}"><i class="fa-solid fa-trash-can"></i></a>
                              </td>
                         </tr>
                         @php
                              $subtotal += $cart->rel_to_product->after_discount * $cart->quantity;
                          @endphp
                         @endforeach
                    </table>
                    <div class="mb-3 m-auto text-center">
                         <button type="submit" class="btn btn-danger">Update Cart</button>
                    </div>
                    </form>
          </div>
     </section>
     <!-- cart_details part HTML End -->
     <!-- cart_details part HTML End -->
     <!-- cart_total part HTML Start -->
     <section id="cart_total_details">
          <div class="container">
               <div class="row">
                    <div class="col-lg-12">
                         <div class="cart_total_part">
                              <h3>Cart Total</h3>
                              @php
                                   if($type == 2){
                                        $discount_final = $subtotal*$discount/100;
                                   }
                                   else{
                                        $discount_final = $discount;
                                   }
                              @endphp
                              @php
                                   session([
                                        'discount_final' => $discount_final
                              ])
                              @endphp
                              @if ($message)
                                   <strong class="text-danger">{{$message}}</strong>
                              @endif
                              <div class="coupon">
                                   <form action="">
                                        <label for="" class="form-label">Coupon Apply</label>
                                        <input type="text" name="coupon" class="form-control" value="{{@$_GET['coupon']}}" placeholder="Enter Coupon Code Here ...">
                                        <button type="submit">Apply</button>
                                   </form>
                              </div>
                              <ul>
                                   <li>
                                        <h4>Sub Total</h4>
                                        <h4 class="right_price">TK {{$subtotal}}</h4>
                                   </li>
                                   <li>
                                        <h4>Discount</h4>
                                        <h4 class="right_price">(-) TK {{$discount_final}}</h4>
                                   </li>
                              </ul>
                              <div class="total_process">
                                   <h3>Total  Amount</h3>
                                   <ul>
                                        <li><h4 class="right_price">TK {{$subtotal - $discount_final}}</h4></li>
                                   </ul>
                                   <div class="procees_btn">
                                        <a href="{{route('checkout')}}">Process To Checkout</a>
                                        <a href="{{route('frontend')}}">Return To Shipping</a>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <!-- cart_total part HTML End -->
@endsection
@section('footer_script')
<script>
     var quantity_input = document.querySelectorAll('.abc');
     var arr = Array.from(quantity_input);

     arr.map(item=>{
          item.addEventListener('click', function(e){
               if(e.target.className == 'fa-solid fa-plus'){
                    e.target.parentElement.previousElementSibling.value++
                    var quantity = e.target.parentElement.previousElementSibling.value
                    var price = e.target.dataset.price
                    item.nextElementSibling.innerHTML = price*quantity
               }
               if(e.target.className == 'fa-solid fa-minus'){
                    if(e.target.parentElement.nextElementSibling.value > 1){
                       e.target.parentElement.nextElementSibling.value--
                       var quantity = e.target.parentElement.nextElementSibling.value
                       var price = e.target.dataset.price
                       item.nextElementSibling.innerHTML = price*quantity
                    }
               }
          });
     });
</script>
@endsection