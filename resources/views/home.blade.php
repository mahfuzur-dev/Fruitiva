@extends('layouts.dashboard')

@section('content')
<div class="container">
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="javascript:void(0);">Home</a>
    </li>
</ol>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <h3>Welcome Dashboard <strong class="badge bg-success">{{Auth::user()->name}}</strong></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
