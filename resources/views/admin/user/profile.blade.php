@extends('layouts.dashboard')

@section('content')
<div class="container">
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('home')}}">Home</a>/
        <a href="javascript:void(0);">Profile</a>
    </li>
</ol>
<div class="row">
     <div class="col-lg-4">
         <div class="card">
            <div class="card-header">
                <h3>Change Name</h3>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <div class="card-body">
                <form action="{{route('update.name')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-lable">Name</label>
                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success" type="submit">Update Name</button>
                    </div>
                </form>
            </div>
         </div>
     </div>
     <div class="col-lg-4">
         <div class="card">
            <div class="card-header">
                <h3>Change Password</h3>
            </div>
            @if (session('success_pass'))
                <div class="alert alert-success">{{session('success_pass')}}</div>
            @endif
            @if (session('wrong'))
                <div class="alert alert-danger">{{session('wrong')}}</div>
            @endif
            <div class="card-body">
                <form action="{{route('change.password')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-lable">Old Password</label>
                        <input type="password" class="form-control" name="old_password">
                            @error('old_password')
                                 <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-lable">New Password</label>
                        <input type="password" class="form-control" name="password">
                         @error('password')
                                 <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-lable">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                         @error('password_confirmation')
                                 <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success" type="submit">Update Password</button>
                    </div>
                </form>
            </div>
         </div>
     </div>
     <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Profile Photo</h3>
            </div>
              @if (session('success_profile'))
                <div class="alert alert-success">{{session('success_profile')}}</div>
            @endif
            <div class="card-body">
                <form action="{{route('profile.photo')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Profile Photo</label>
                        <input type="file" name="profile_photo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
     </div>
</div>
@endsection
