@extends('layout.master')

@section('content')
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">{{ __('pages.contact_us') }}</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="ظ">{{ __('pages.home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('pages.contact_us') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Contact Form -->
    <section class="contact-form">
        <div class="container">
            <div class="section-header text-center">
                <h2>{{ __('pages.get_in_touch') }}!</h2>
            </div>
            <div class="row">
                <div class="col-md-6 me-5">
                    <form method="post" enctype="multipart/form-data" action="{{ route('contact.modify') }}" class="ajax-form" resetAfterSend  swalOnSuccess="{{ __('pages.sucessdata') }}" title="{{ __('pages.opps') }}" swalOnFail="{{ __('pages.wrongdata') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4"> 
                                <div class="form-group">
                                    <label class="mb-2">{{ __('pages.name') }}</label>
                                    <input class="form-control rounded-pill border border-secondary" type="text" name="name" placeholder="{{ __('pages.name') }}">
                                    <p class="error error_name"></p>
                                </div>
                            </div>
                            <div class="col-md-4"> 
                                <div class="form-group">
                                    <label class="mb-2">{{ __('pages.email') }}</label>
                                    <input class="form-control rounded-pill border border-secondary text-start" type="email" name="email" placeholder="{{ __('pages.email') }}">
                                    <p class="error error_email"></p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="mb-2">{{ __('pages.mobile') }}</label>
                                    <input class="form-control rounded-pill border border-secondary" type="phone" name="phone" placeholder="{{ __('pages.mobile') }}" value="@isset($clinic->id){{$clinic->phone}}@endisset">
                                    <p class="error error_phone"></p>
                                </div>
                            </div>
                            <div class="col-md-12"> 
                                <div class="form-group">
                                    <label class="mb-2">{{ __('pages.subject') }}</label>
                                    <input class="form-control rounded-pill border border-secondary" type="text" name="subject" placeholder="{{ __('pages.subject') }}">
                                    <p class="error error_subject"></p>
                                </div>
                            </div>
                            <div class="col-md-12"> 
                                <div class="form-group">
                                    <label class="mb-2">{{ __('pages.comments') }}</label>
                                    <textarea class="form-control border border-secondary" type="text" name="comments" placeholder="{{ __('pages.comments') }}"></textarea>
                                    <p class="error error_comments"></p>
                                </div>
                            </div>
                        </div>		
                        <input type="hidden" value="1" name="clinic_id">
                        <div class="submit-section">
                            <button class="btn btn-primary rounded-pill mt-2 px-5 submit-btn" type="submit" name="form_submit" placeholder="submit">{{ __('pages.submit') }}</button>
                        </div>		
                    </form>
                </div>
                <div class="col-md-4 ms-5">
                    <img src="{{ asset('assets/img/Get in touch-bro.png') }}" class="img-fluid" alt="feature">
                </div>
            </div>
        </div>
    </section>
    <!-- /Contact Form -->

    <!-- Contact Map -->
    <section class="contact-map d-flex">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3459.716346058072!2d-95.5565430855612!3d29.872453233633234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640cfe4516785ed%3A0x774974592a609121!2s54%20Northwest%20Fwy%20%23558%2C%20Houston%2C%20TX%2077040%2C%20USA!5e0!3m2!1sen!2sin!4v1631855334452!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
    </section>
    <!-- /Contact Map -->
@endsection

@section('js')

@endsection