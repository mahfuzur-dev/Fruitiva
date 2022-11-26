@extends('layouts.dashboard')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('home')}}">Home</a>/
        <a href="javascript:void(0);">Users</a>
    </li>
</ol>
<div class="row">
     <div class="col-lg-8 m-auto">
          <div class="card">
               <div class="card-header bg-info">
                    <h3 class="text-white">User List <strong style="color: red;">({{$total_user}})</strong></h3>
               </div>
               @if (session('delete'))
                    <div class="alert alert-success">{{session('delete')}}</div>
               @endif
               <div class="card-body text-center">
                    <table class="table table-striped table-hover">
                         <tr>
                              <th>Sl No</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Action</th>
                         </tr>
                         @foreach ($users as $key=>$user)
                         <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>
                                   <div class="dropdown">
                                   <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                   </button>
                                   <div class="dropdown-menu" style="">
                                        <a class="dropdown-item" href="{{route('users.delete',$user->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                                   </div>
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