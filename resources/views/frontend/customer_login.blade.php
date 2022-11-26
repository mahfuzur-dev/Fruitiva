@extends('frontend.master')
@section('content')
<!-- Login HTML Start -->
<section id="register">
     <div class="container">
          <div class="row">
               <div class="col-lg-6 m-auto text-center">
                    <div class="register_form">
                         @if (session('reset_success'))
                              <div class="alert alert-success">{{session('reset_successa')}}</div>
                         @endif
                         @if (session('verify'))
                              <div class="alert alert-success">{{session('verify')}}</div>
                         @endif
                         @if (session('verify_email'))
                              <div class="alert alert-danger">{{session('verify_email')}}</div>
                         @endif
                         <p>Login Form</p>
                         <form action="{{route('customer.login.store')}}" class="regi_form" method="POST">
                              @csrf
                              <div class="mb-3">
                                   <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
                              </div>
                              <div class="mb-3">
                                   <input type="password" name="password" class="form-control" placeholder="Enter Your Password">
                              </div>
                              
                              <div class="mb-3">
                                   <button type="submit">Login</button>
                              </div>
                              <div class="mb-3">
                                   <a href="{{route('password.reset.request.form')}}">Forgotten Password?</a>
                              </div>
                              <div class="mb-3">
                                   <a href="{{url('/github/redirect')}}" class="login_btngit"><i class="fa-brands fa-github"></i>Continue With Github</a>
                              </div>
                              <div class="mb-3 mt-4">
                                   <a href="{{url('/google/redirect')}}" class="login_btng"><i class="fa-brands fa-google"></i>Continue With Google</a>
                              </div>
                              <div class="mb-3 mt-4">
                                   <a href="" class="login_btnf"><i class="fa-brands fa-facebook-f"></i>Continue With Facebokk</a>
                              </div>
                         </form>
                         <hr>
                         <div class="mb-3">
                              <a class="create_btn" href="{{route('customer.register')}}">Create New Account</a>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</section>
<!-- Login HTML End -->
@endsection