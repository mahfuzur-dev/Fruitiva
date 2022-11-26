@extends('frontend.master')
@section('content')
<!-- Order Error HTML start -->
<section id="order_success">
     <div class="container">
          <div class="row">
               <div class="col-lg-12 m-auto text-center">
                    <div class="order_success_message">
                         <h2>404</h2>
                         <h3>Oops! Page Not Found!</h3>
                         <p>We’re sorry but we can’t seem to find the page you requested. <br>This might be because you have typed the web address
                         incorrectly.</p>
                         <a href="{{route('frontend')}}">Countinue Shopping</a>
                    </div>
               </div>
          </div>
     </div>
</section>
<!-- Order Error HTML End -->
@endsection