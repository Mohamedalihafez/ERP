@extends('layout.master')

@section('content')
<div class="content">
    <div class="container register_container mb-4">
        <div class="row">
            <div class="col-md-12">
            @if (\Session::has('success'))
                <div class="alert alert-danger text-center">
                    <ul>
                       {{ __('pages.phone_is_not_registered')}}
                    </ul>
                </div>
            @endif
                <!-- Register Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
            
                        <div class="col-md-12 col-lg-6 login-right">
                            <Div class="col-md-12">
                                <div class="row">
                                    <div class="login-header">
                                        <h3>{{ __('pages.forget_password') }}</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Register Form -->
                            <form method="POST" action="{{ route('resetpaswword') }}">
                                @csrf
                                <div class="row">
                                    <label class="mb-2">{{ __('pages.Phone') }}</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input placeholder="**********"  type="text" id="number" class="form-control @error('phone') is-invalid @enderror" name="phone" >
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <x-country-phone-code></x-country-phone-code>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg login-btn">
                                    {{ __('pages.next') }}
                                </button>
                            </form>

                        </div>
                        <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{ asset('assets/img/Reset password-amico.png') }}" class="img-fluid" alt="Appointment-Task Reset">	
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