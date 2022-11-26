@extends('frontend.master')
@section('content')
<!-- Order Success HTML start -->
<section id="order_success">
     <div class="container">
          <div class="row">
               <div class="col-lg-12 m-auto text-center">
                    <div class="order_success_message">
                         <i class="fa-solid fa-cart-shopping"></i>
                         @if (session('success'))
                         <h3>{{session('success')}}</h3>
                         @endif
                         <br>
                         <a href="{{route('frontend')}}">Order More ..</a>
                    </div>
               </div>
          </div>
     </div>
</section>
<!-- Order Success HTML End -->

@endsection