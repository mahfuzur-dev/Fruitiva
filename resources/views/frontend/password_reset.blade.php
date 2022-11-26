@extends('frontend.master')
@section('content')
<!-- Login HTML Start -->
<section id="register">
     <div class="container">
          <div class="row">
               <div class="col-lg-6 m-auto text-center">
                    <div class="register_form">
                         <p>Password Reset Request</p>
                         <form action="{{route('pass_reset.send')}}" class="regi_form" method="POST">
                              @csrf
                              <div class="mb-3">
                                   <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
                              </div>
                              <div class="mb-3">
                                   <button type="submit">Submit</button>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</section>
<!-- Login HTML End -->
@endsection