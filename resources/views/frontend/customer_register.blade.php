@extends('frontend.master')
@section('content')
<!-- Register HTML Start -->
     <section id="register">
          <div class="container">
               <div class="row">
                    <div class="col-lg-6 m-auto text-center">
                         @if (session('success'))
                              <div class="alert alert-success">{{session('success')}}</div>
                         @endif
                         <div class="register_form">
                              <p>Registration Form</p>
                              <form action="{{route('add.register')}}" class="regi_form" method="POST">
                                   @csrf
                                   <div class="mb-3">
                                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                                   </div>
                                   @error('name')
                                        <strong class="text-danger">{{$message}}</strong>
                                   @enderror
                                   <div class="mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
                                   </div>
                                    @error('email')
                                        <strong class="text-danger">{{$message}}</strong>
                                   @enderror
                                   <div class="mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Enter Your Password">
                                   </div>
                                    @error('password')
                                        <strong class="text-danger">{{$message}}</strong>
                                   @enderror
                                   <div class="mb-3">
                                        <button type="submit">Sign Up</button>
                                   </div>
                              </form>
                              <hr>
                              <div class="mb-3">
                                  <a href="{{route('customer.login')}}">Have you already a account? Sign In</a>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <!-- Register HTML End -->
@endsection