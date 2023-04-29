@extends('layout.master')

@section('content')
<div class="content">
    <div class="container register_container mb-4">
        <div class="row">
            <div class="col-md-12">
                <!-- Register Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 col-lg-6 login-right">
                            <Div class="col-md-12">
                                <div class="row">
                                    <div class="login-header text-center">
                                        <h3>{{ __('pages.add password') }}</h3>
                                    </div>
                                    <p class="error error_token text-center color-red"></p> 
                                </div>
                            </div>
                            <form method="POST" class="ajax-form"  action="{{ route('user.changepassword') }}" redirect="{{ route('login') }}" enctype="multipart/form-data" swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}">
                                @csrf
                                <input type="hidden"  name="phone" value="{{ Request()->phone }}">
                                <input type="hidden"  name="token" value="{{ Request()->token }}">
                                    <div class="row">
                                        <div class="row">
                                            <label class="mb-2">{{ __('pages.Password') }}</label>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input id="password" type="password" class="form-control @error('newPassword') is-invalid @enderror" name="password"  autocomplete="current-password">
                                                    <p class="error error_password"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="mb-2">{{ __('pages.Confirm Password') }}</label>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input id="confirm_password" type="password" class="form-control @error('confirmPassword') is-invalid @enderror" name="password_confirmation"  autocomplete="current-password">
                                                    <p class="error error_password_confirmation"></p>
                                                </div>
                                            </div>
                                        </div>                  
                                    </div>         
                                <button type="submit" class="btn btn-primary btn-lg login-btn">
                                    {{ __('pages.confirm') }}
                                </button>
                            </form>
                        </div>
                        <div class="col-md-7 col-lg-6 login-left">
                            <img src="{{ asset('assets/img/Reset password-bro.png') }}" class="img-fluid" alt="Appointment-Task Login">	
                        </div>
                    </div>
                </div>
                <!-- /Register Content -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection