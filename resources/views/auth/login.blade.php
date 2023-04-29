@extends('layout.master')

@section('content')

    <div class="content">
        <div class="container-fluid">   
            <div class="row">
                <div class="col-md-8 offset-md-2">      
                    <!-- Login Tab Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{ asset('assets/img/Authentication-rafiki.png') }}" class="img-fluid" alt="Appointment-Task Login">	
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>{{ __('pages.login_to', ['attribute' => 'TASK']) }}</h3>
                                </div>
                                @if (session('message'))
                                    <div class="alert alert-danger">{{ session('message') }}</div>
                                @endif
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <label class="mb-2">{{ __("pages.Phone") }}</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="number" id="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? getDataFromPersonnal('phone') }}">
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <x-country-phone-code></x-country-phone-code>
                                            @error('countryCode')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" >{{ __('pages.Password') }}</label>
                                        <input type="password" placeholder="********" name="password" class="form-control mt-2" value="{{ old('password') }}">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                         @enderror
                                    </div>
                                    <div class="text-start">
                                        <a class="forgot-link" href="{{ route('forget.password') }}">{{__('pages.forget_password')}}</a>
                                    </div>
                                    <button class="btn btn-primary btn-lg login-btn" type="submit">{{__('pages.login')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>	
@endsection

