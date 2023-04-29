@extends('layout.master')

@section('content')
<div class="content">
    <div class="container register_container mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-12 login-right">
                            <Div class="col-md-12">
                                <div class="row">
                                    <div class="login-header text-center">
                                        <h3>{{ __('pages.registersuccess',['attribute' => 'TASK ']) }}</h3>
                                    </div>

                                </div>
                            </div>
                            <div class="container d-flex justify-content-center flex-column align-items-center">
                                <div class="img-container  d-flex justify-content-center flex-column align-items-center">
                                    <img height="250px !important" src="{{ asset('assets/img/Authentication-bro.png') }}"  alt="Appointment-Task Login">	
                                    <a class="btn btn-primary btn-edition " href="{{ route('login') }}">{{__('pages.login')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

</div>
@endsection
