@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->get('message'))
            <div class="alert prof-pic-alert" role="alert">
                <strong>Success: </strong>{{session()->get('message')}}
            </div>
            @endif
            <div class="card bg-dark">
                <div class="card-header">{{ __('Setting / ') }}@yield('setting-title')</div>

                <div class="card-body pass-body-card">                
                    <div class="card-b1">
                        <a href="{{route('changePasswordGet')}}"><i class="fa fa-key fa-lg" aria-hidden="true"></i> Change Password</a><br>
                        <a href="{{route('changePhotoGet')}}"><i class="fa fa-user-circle" aria-hidden="true"></i> Change Photo</a>
                    </div>
                    <div class="card-b2">
                        @yield('setting')
                    </div>
                </div>           
            </div>
        </div>
    </div>
</div>
@endsection