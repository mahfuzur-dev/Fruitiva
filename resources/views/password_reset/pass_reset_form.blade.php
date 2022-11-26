@extends('frontend.master')
@section('content')
<!-- Login HTML Start -->
<section id="register">
     <div class="container">
          <div class="row">
               <div class="col-lg-6 m-auto text-center">
                    <div class="register_form">
                         <p>Password Reset Form</p>
                         <form action="{{route('customer.reset.password')}}" class="regi_form" method="POST">
                              @csrf
                              <div class="mb-3">
                                   <label for="" class="form-label">New Password</label>
                                   <input type="password" name="password" class="form-control" placeholder="Enter Your New Password">
                                   <input type="hidden" name="reset_token" class="form-control" value="{{$data}}">
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