@extends('layout.master')

@section('css')
<link href="{{ asset('admin_assets\assets\css\fileupload.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="content">
    <div class="container register_container mb-4">
        <div class="row">
            <div class="col-md-12 ">
                <!-- Register Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-12 login-right">
                            <Div class="col-md-12">
                                <div class="row">
                                    <div class="login-header text-center">
                                        <h3>{{ __('pages.Data is being verified') }}</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Register Form -->
                            <div class="container d-flex justify-content-center flex-column align-items-center">
                                <div class="img-container  d-flex justify-content-center flex-column align-items-center">
                                    <img src="{{ asset('assets/img/Enter OTP-amico.png') }}" class="w-50">
                                </div>
                                <div class="text-container text-center d-flex justify-content-center align-items-center flex-column">
                                    <h2>شارفنا علي الانتهاء</h2>
                                    <p>
                                    سوف نحتاج ان نتاكد من هويتك عن طريق ارسال رسالة نصية للرقم 
                                    <br>
                                    الذي ارسلته لنا {{ getDataFromForget('phone') }} {{ getDataFromForget('country_code') }}+
                                    </p>
                                    <input type="hidden" value="{{ getDataFromForget('phone') }}{{ getDataFromForget('country_code') }}+">
                                    <div id="recaptcha-container"></div>
                                    <button class="btn btn-primary btn-edition g-recaptcha send_otp d-none">ارسل الرمز</button>
                                    
                                    <div class="d-flex justify-content-center loader_wait">
                                        <p class="grid"> 
                                            <span>انتظر قليلا</span>
                                            <span class="loader confirm"></span>
                                        </p>
                                    </div>

                                    <div class="otp_container w-100 d-flex justify-content-center mt-2">
                                        <form class="d-none otp_form">
                                            <input type="number" class="input_1 form-control input_otp mx-2 text-center" index="1"  min="0" max="9" step="1" >
                                            <input type="number" class="input_2 form-control input_otp mx-2 text-center" index="2"  min="0" max="9" step="1" >
                                            <input type="number" class="input_3 form-control input_otp mx-2 text-center" index="3"  min="0" max="9" step="1" >
                                            <input type="number" class="input_4 form-control input_otp mx-2 text-center" index="4"  min="0" max="9" step="1" >
                                            <input type="number" class="input_5 form-control input_otp mx-2 text-center" index="5"  min="0" max="9" step="1" >
                                            <input type="number" class="input_6 form-control input_otp mx-2 text-center" index="6"  min="0" max="9" step="1" >
                                        </form>
                                    </div>

                                    <div class="d-flex justify-content-center loader_send d-none mt-2">
                                        <p class="grid"> 
                                            <span>انتظر قليلا</span>
                                        </p>
                                    </div>
                                    <p id="error" class="error mt-2"></p>
                                </div>
                            </div>
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
<script src="{{ asset('admin_assets\assets\js\fileupload.js')}}"></script>
<script src="{{ asset('admin_assets\assets\js\dropify.js') }}"></script>
<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

<script>
  var firebaseConfig = {
            apiKey: "AIzaSyCd9H4ljFvCWwviZyyS5QshDi0gctG2PII",
            authDomain: "prefab-mountain-348801.firebaseapp.com",
            projectId: "prefab-mountain-348801",
            storageBucket: "prefab-mountain-348801.appspot.com",
            messagingSenderId: "1085654590129",
            appId: "1:1085654590129:web:8d2082744b421640253890",
            measurementId: "G-QSQ8Y50G76"
    };
    firebase.initializeApp(firebaseConfig);
</script>
<script type="text/javascript">
    
    $('.loader_wait').addClass('d-none');
    $('.send_otp').removeClass('d-none').addClass('d-block');
    window.onload = function () {
        render();
    };
    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container',{
            size: "invisible",
        });
        recaptchaVerifier.render();
    }
    function sendOTP() {
        var number = '{{getPhoneNumberFromForget()}}';
        $("#error").text('');
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': "application/json"
                },
                url: '{{ route("reset.verification.save") }}',
                method: 'POST',
                data:{verification_id: confirmationResult.verificationId}
            });
            $("#successAuth").text("Message sent");
            $("#successAuth").show();
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
            $('.input_otp').attr('disabled',false);
        });
        $('.loader_send').addClass('d-none');
    }
    function verify(otp) {
        coderesult.confirm(otp).then(function (result) {
            var user = result.user;
            console.log(coderesult.verificationId);
            // window.location.href = "http://127.0.0.1:8000/register/confirm"
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': "application/json"
                },
                url: '{{ route("reset.verification.check") }}',
                method: 'GET',
                data:{verification_id: coderesult.verificationId},
                success:function(){
                    setTimeout(() => {
                        window.location.href = `/forget-password/reset-success/verification?verification_id=${coderesult.verificationId}&phone={{getPhoneNumberFromForget()}}`;
                    }, 1000);
                },
                }).fail(function(){
                Swal.fire({
                    icon: 'error',
                    text: `{{ __('pages.error_data') }}`,
                    confirmButtonText:`{{ __('pages.pleasetryagain') }}`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log('1');
                        window.location.href = `{{ route("register.confirm") }}`;}
                    });
                });
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
                $('.input_otp').attr('disabled',false);
            });
                    $('.loader_send').addClass('d-none'); 
            } 
            $('.send_otp').on('click',function(){
                sendOTP();
                $(this).addClass('d-none');
                $('.otp_form').removeClass('d-none');
                $('.otp_form').addClass('d-flex');
            });
            $('.otp_form .input_otp').on('input',function(){
                let index = $(this).attr('index');
                let nextIndex = parseInt(index) + 1;
                $(`.input_${nextIndex}`).focus()
            });
            $('.input_otp').on('focus',function(){
                let index = $(this).attr('index');
                let prevIndex = parseInt(index) - 1;
                if ( index > 1) {
                    let prev_val = $(`.input_${prevIndex}`).val().length;
                    if ( prev_val == 0) {
                        $(`.input_${prevIndex}`).focus();
                    }
                
                }
            });
    $('.input_6').on('input',function(){
        let otp = '';
        otp += $('.input_1').val();
        otp += $('.input_2').val();
        otp += $('.input_3').val();
        otp += $('.input_4').val();
        otp += $('.input_5').val();
        otp += $('.input_6').val();
        $('.input_otp').attr('disabled',true);
        $('.loader_send').removeClass('d-none');
        verify(otp);
    });
</script>
@endsection