@extends('layouts.dashboard')
@section('content')
<div class="row">
     <div class="col-lg-12">
          <div class="card">
               <div class="card-header">
                    <h3>Order List</h3>
               </div>
               <div class="card-body">
                    <table class="table table-striped table-hover">
                         <tr>
                              <th>SL No</th>
                              <th>Order No</th>
                              <th>Sub Total</th>
                              <th>Discount</th>
                              <th>Charge</th>
                              <th>Total</th>
                              <th>Status</th>
                              <th>Action</th>
                         </tr>
                         @foreach ($orders as $key=>$order)
                              <tr>
                                  <td>{{$key+1}}</td>
                                  <td>{{$order->id}}</td>
                                  <td>TK {{$order->subtotal}}</td>
                                  <td>TK {{$order->discount}}</td>
                                  <td>TK {{$order->delivary}}</td>
                                  <td>TK {{$order->total}}</td>
                                  <td>
                                        @php
                                             if($order->status == 1){
                                                  echo '<span class="badge bg-label-info">Placed</span>';
                                             }
                                             elseif($order->status == 2){
                                                  echo '<span class="badge bg-label-warning">Processing</span>';
                                             }
                                             elseif($order->status == 3){
                                                  echo '<span class="badge bg-label-primary">Ready To Deliver</span>';
                                             }
                                             elseif($order->status == 4){
                                                  echo '<span class="badge bg-label-success">Delivery</span>';
                                             }
                                             elseif($order->status == 5){
                                                  echo '<span class="badge bg-label-danger">Cancel</span>';
                                             }
                                             else {
                                                  echo 'Unknown';
                                             }
                                        @endphp
                                  </td>
                                  <td>
                                        <div class="dropdown">
                                             <form action="{{route('order.status')}}" method="POST">
                                                  @csrf
                                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                  </button>
                                                  <div class="dropdown-menu">
                                                       <button class="dropdown-item status" name="status" value="{{$order->id.','.'1'}}">Placed</button>
                                                       <button class="dropdown-item status" name="status" value="{{$order->id.','.'2'}}">Processing</button>
                                                       <button class="dropdown-item status" name="status" value="{{$order->id.','.'3'}}">Ready To Deliver</button>
                                                       <button class="dropdown-item status" name="status" value="{{$order->id.','.'4'}}">Delivery</button>
                                                       <button class="dropdown-item status" name="status" value="{{$order->id.','.'5'}}">Cancel</button>
                                                  </div>
                                             
                                             </form>
                                        </div>
                                  </td>
                              </tr>
                         @endforeach
                    </table>
               </div>
          </div>
     </div>
</div>
@endsection
