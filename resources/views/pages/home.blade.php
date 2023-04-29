@extends('layout.master')
@section('content')
<!-- Main Wrapper -->

<div class="main-wrapper">
    <!-- Home Banner -->
  
    <section class="section section-features mt-5  ">
        <div class="container ">
            <div class="row">
                <div class="col-lg-6 banner-img flex-start">
                    <img src="{{ asset('assets/img/Privacy policy-amico.png') }}" class="img-fluid img-privacy" alt="feature">
                </div>
                <div class="col-lg-5 accordion_container  text-center  ">
                    <h1 class="text-blue ">الشروط و الاحكام</h1>
                    <p>نحن نوفر لك الحلول لحياه اسهل</p>
                    <div class="mt-30">
                        <div class=" card plain  accordion_home accordion-item">
                            <div class="card-header" id="headingOne">
                                <button class="accordion-button accordion-label collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    الخصوصية</button>
                            </div>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample" style="">
                                <div class="card-body">
                                    <div class="accordion">
                                        <div class="accordion-content">
                                            <p> هلوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                                                أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد
                                                أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس
                                                أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت
                                                نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا
                                                كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم."
                                                "سيت يتبيرسبايكياتيس يوندي أومنيس أستي ناتيس أيررور سيت فوليبتاتيم أكيسأنتييوم
                                            </p>
                                        </div>
                                    </div>
                                    <!--/.card-body -->
                                </div>
                            </div>
                        </div>
                        <div class="card plain accordion_home  accordion-item">
                            <div class="card-header" id="headingTwo">
                                <button class="accordion-button accordion-label collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    الاستخدام المشروع</button>
                            </div>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample" style="">
                                <div class="card-body">
                                    <div class="accordion">
                                        <div class="accordion-content">
                                            <p> هلوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                                                أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد
                                                أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس
                                                أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت
                                                نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا
                                                كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم."
                                                "سيت يتبيرسبايكياتيس يوندي أومنيس أستي ناتيس أيررور سيت فوليبتاتيم أكيسأنتييوم
                                            </p>
                                        </div>
                                    </div>
                                    <!--/.card-body -->
                                </div>
                            </div>
                        </div>
                        <div class="card plain accordion_home  accordion-item">
                            <div class="card-header" id="headingThree">
                                <button class="accordion-button accordion-label collapsed"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree">
                                    الملكية الفكرية </button>
                            </div>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
                                <div class="card-body">
                                    <div class="accordion">
                                        <div class="accordion-content">
                                            <p> هلوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                                                أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد
                                                أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس
                                                أيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت
                                                نيولا باراياتيور. أيكسسيبتيور ساينت أوككايكات كيوبايداتات نون بروايدينت ,سيونت ان كيولبا
                                                كيو أوفيسيا ديسيريونتموليت انيم أيدي ايست لابوريوم."
                                                "سيت يتبيرسبايكياتيس يوندي أومنيس أستي ناتيس أيررور سيت فوليبتاتيم أكيسأنتييوم
                                            </p>
                                        </div>
                                    </div>
                                    <!--/.card-body -->
                                </div>
                            </div>
                            <!--/.accordion-item -->
                        </div>
                        <!--/.accordion -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Popular Section -->
    <section class="section home-tile-section contact-form  mt-5">
        <div class="container">
            <div class="section-header text-center">
                <h2>{{ __('pages.get_in_touch') }}!</h2>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <form method="post" class="ajax-form" enctype="multipart/form-data" action="{{ route('contact.modify') }}" swalOnSuccess="تم ارسال استفسارك" resetAfterSend>
                        @csrf
                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label class="mb-2">{{ __('pages.your_name') }}</label>
                                    <input class="form-control" type="text" name="name" placeholder="{{ __('pages.name') }}">
                                    @error('name')
                                        <div class="error mt-2 alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label class="mb-2">{{ __('pages.your_email') }}</label>
                                    <input class="form-control text-start" type="email" name="email" placeholder="{{ __('pages.email') }}">
                                </div>
                            </div>
                            <div class="col-md-12"> 
                                <div class="form-group">
                                    <label class="mb-2">{{ __('pages.subject') }}</label>
                                    <input class="form-control" type="text" name="subject" placeholder="{{ __('pages.subject') }}">
                                </div>
                            </div>
                            <div class="col-md-12"> 
                                <div class="form-group">
                                    <label class="mb-2">{{ __('pages.comments') }}</label>
                                    <textarea class="form-control" type="text" name="comments" placeholder="{{ __('pages.comments') }}"></textarea>
                                </div>
                            </div>
                        </div>		
                        <input type="hidden" value="1" name="clinic_id">
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" type="submit" name="form_submit" placeholder="submit">{{ __('pages.submit') }}</button>
                        </div>		
                    </form>
                </div>
                <div class="col-md-4 ms-5">
                    <img src="{{ asset('assets/img/Get in touch-bro.png') }}" class="img-fluid" alt="feature">
                </div>
            </div>
        </div>
    </section>
    <!-- /Popular Section -->
@endsection

