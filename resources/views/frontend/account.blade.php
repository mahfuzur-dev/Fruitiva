@extends('frontend.master')
@section('content')
<!-- Account HTML Start -->
<section class="account_section section_space">
     <div class="container">
          <div class="row">
               <div class="col-lg-3 account_menu">
                    <div class="nav account_menu_list flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                         aria-orientation="vertical">
                         <button class="nav-link text-start w-100" id="v-pills-home-tab" data-bs-toggle="pill"
                              data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                              aria-selected="false">Account Dashboard </button>
                         <button class="nav-link text-start w-100 active" id="v-pills-profile-tab" data-bs-toggle="pill"
                              data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                              aria-selected="true">Acount</button>
                         <button class="nav-link text-start w-100" id="v-pills-messages-tab" data-bs-toggle="pill"
                              data-bs-target="#v-pills-messages" type="button" role="tab"
                              aria-controls="v-pills-messages" aria-selected="false">My Orders</button>
                    </div>
               </div>
               <div class="col-lg-9">
                    <div class="tab-content bg-light p-3" id="v-pills-tabContent">
                         <div class="tab-pane fade text-center" id="v-pills-home" role="tabpanel"
                              aria-labelledby="v-pills-home-tab">
                              <h5>Welcome to Account</h5>
                              <div class="row">
                                   <div class="col-lg-6 m-auto text-center">
                                        <div class="profile_photo">
                                             <img src="assets/images/ava.jpg" alt="">
                                        </div>
                                        <div class="profile_name">
                                             <h3>{{Auth::guard('customerlogin')->user()->name}}</h3>
                                             <p>{{Auth::guard('customerlogin')->user()->email}}</p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel"
                              aria-labelledby="v-pills-profile-tab">
                              <h5 class="text-center pb-3">Account Details</h5>
                              <form class="row g-3 p-2">
                                   <div class="col-md-6">
                                        <label for="inputnamel4" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="inputnamel4" value="{{Auth::guard('customerlogin')->user()->name}}">
                                   </div>
                                   <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="inputEmail4" value="{{Auth::guard('customerlogin')->user()->email}}">
                                   </div>
                                   <div class="col-md-12">
                                        <label for="inputPassword4" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="inputPassword4">
                                   </div>
                                   <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary active">Update</button>
                                   </div>
                              </form>
                         </div>
                         <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                              aria-labelledby="v-pills-messages-tab">
                              <h5 class="text-center pb-3">Your Orders</h5>
                              <table class="table table-bordered">
                                   <tbody>
                                        <tr>
                                             <th>Order No</th>
                                             <th>Sub Total</th>
                                             <th>Discount</th>
                                             <th>Delivery Charge</th>
                                             <th>Total</th>
                                             <th>Action</th>
                                             <th>Action</th>
                                        </tr>
                                        @foreach ($orders as $order)
                                             <tr>
                                                  <td>#{{$order->id}}</td>
                                                  <td>{{$order->subtotal}}</td>
                                                  <td>{{$order->discount}}</td>
                                                  <td>{{$order->delivary}}</td>
                                                  <td>{{$order->total}}</td>
                                                  <td>
                                        @php
                                             if($order->status == 1){
                                                  echo '<span class="badge bg-info">Placed</span>';
                                             }
                                             elseif($order->status == 2){
                                                  echo '<span class="badge bg-warning">Processing</span>';
                                             }
                                             elseif($order->status == 3){
                                                  echo '<span class="badge bg-primary">Ready To Deliver</span>';
                                             }
                                             elseif($order->status == 4){
                                                  echo '<span class="badge bg-success">Delivery</span>';
                                             }
                                             elseif($order->status == 5){
                                                  echo '<span class="badge bg-danger">Cancel</span>';
                                             }
                                             else {
                                                  echo 'Unknown';
                                             }
                                        @endphp
                                  </td>
                                                  <td>
                                                       <a href="{{route('invoice',$order->id)}}" class="download_btn">Download Invoice</a>
                                                  </td>
                                             </tr>
                                        @endforeach
                                   </tbody>
                              </table>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</section>
<!-- Account HTML End -->
@endsection