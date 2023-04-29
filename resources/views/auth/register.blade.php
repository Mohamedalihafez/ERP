@extends('layout.master')

@section('content')
<div class="content">
    <div class="container register_container mb-4">
        <div class="row">
            <div class="col-md-12">
                <!-- Register Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-12 login-right">
                            <Div class="col-md-12">
                                <div class="row">
                                    <div class="login-header">
                                        <h3>{{ __('pages.register_to',['attribute' => 'TASK ']) }}</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <ul class="nav navbar mb-4">
                                            <li class="col-md-4 d-flex bullet_line active">
                                                <span class="bullet mx-1">1</span>
                                                <span class="mt-1">{{ __('pages.Add Information') }}</span>
                                            </li>
                                            <li class="col-md-4 d-flex">
                                                <span class="bullet mx-1 ">2</span>
                                                <span class="mt-1">{{ __('pages.Confirm Information') }} </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Register Form -->
                            <form method="POST" action="{{ route('register.personal.data') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="mb-2">{{ __('pages.Full name') }}</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? getDataFromPersonnal('name') }}" autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="mb-2">{{ __('pages.Email Address') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? getDataFromPersonnal('email') }}" autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password" class="mb-2">{{ __('pages.Password') }}</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password" class="mb-2">{{ __('pages.Confirm Password') }}</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="mb-2">{{ __('pages.Phone') }}</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input placeholder="********"  type="text" id="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? getDataFromPersonnal('phone') }}">
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-2">{{ __('pages.Date of birth') }}</label>
                                            <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') ?? getDataFromPersonnal('date_of_birth') }}">
                                            @error('date_of_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="text-start">
                                    <a class="forgot-link" href="{{ route('login') }}">{{ __('pages.Already have an account?') }}</a>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg login-btn">
                                    {{ __('pages.next') }}
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- /Register Content -->
            </div>
        </div>
    </div>

</div>
@endsection
