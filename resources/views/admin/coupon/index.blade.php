@extends('layouts.dashboard')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('home')}}">Home</a>/
        <a href="javascript:void(0);">Coupon</a>
    </li>
</ol>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Coupon List</h3>
            </div>
            @if (session('delete'))
                <div class="alert alert-warning">{{session('delete')}}</div>
            @endif
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Sl No</th>
                        <th>Coupon Name</th>
                        <th>Coupon Type</th>
                        <th>Amount</th>
                        <th>Validity</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($all_coupons as $key=>$coupon)
                         <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$coupon->coupon_name}}</td>
                              <td>{{$coupon->type}}</td>
                              <td>{{$coupon->amount}}</td>
                              <td>{{$coupon->validity}}</td>
                              <td>
                                   <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="{{route('delete.coupon',$coupon->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                              </td>
                         </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Add Coupon</h3>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <div class="card-body">
                <form action="{{route('add.coupon')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Coupon Name</label>
                        <input type="text" name="coupon_name" class="form-control">
                    </div>
                    @error('coupon_name')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                    <div class="mb-3">
                        <select name="type" class="form-control">
                           <option value=""> --Select Type -- </option>
                           <option value="1"> Solid Amount </option>
                           <option value="2"> Percentage </option>
                        </select>
                    </div>
                    @error('type')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                    <div class="mb-3">
                        <label for="" class="form-label">Amount</label>
                        <input type="number" name="amount" class="form-control">
                    </div>
                    @error('amount')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                    <div class="mb-3">
                        <label for="" class="form-label">Validity</label>
                        <input type="date" name="validity" class="form-control">
                    </div>
                    @error('validity')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Add Coupon</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection