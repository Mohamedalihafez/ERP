<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <title>TASK </title>

            <!-- Favicons -->
            <link type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}" rel="icon">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.rtl.min.css') }}">

            <!-- Fontawesome CSS -->
            <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

            <!-- Feathericon CSS -->
            <link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/css/feathericon.min.css') }}">

            <!-- Main CSS -->
            <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

            <!-- Select 2 -->
            <link href="{{ asset('admin_assets\assets\css\select2.min.css') }}" rel="stylesheet" />

            {{-- Dropify --}}
            <link href="{{ asset('admin_assets\assets\css\fileupload.css') }}" rel="stylesheet" />
            @yield('css')

            <!-- owl carosuel CSS -->
            <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
            <!-- Custom CSS -->
            <link rel="stylesheet" href="{{ asset('assets/css\custom.css') }}">
    </head>

    <body>
        
        <div class="wrapper_container">
            @include('layout.header')
            @yield('content')
            @include('layout.footer')
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap Core JS -->
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Slick JS -->
        <script src="{{ asset('assets/js/slick.js') }}"></script>

        <!-- Select 2 -->
        <script src="{{ asset('admin_assets\assets\js\select2.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="{{asset('assets/js/select2.js')}}"></script>
        
        <!-- Sweet Alert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- Dropify --}}
        <script src="{{ asset('admin_assets\assets\js\fileupload.js')}}"></script>

        {{-- aJAX Actions --}}
        <script src="{{ asset('admin_assets\assets\js\ajaxActions.js') }}"></script>

        <!-- Custom JS -->
        <script src="{{ asset('assets/js/script.js') }}"></script>
        <script src="{{ asset('admin_assets\assets\js\ajaxActions.js') }}"></script>
        <!-- CURSEOL -->
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
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
            window.onload = function () {
                render();
            };
            function render() {
                window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
                recaptchaVerifier.render();
            }
            function sendOTP() {
                var number = $("#number").val();
                firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                    window.confirmationResult = confirmationResult;
                    coderesult = confirmationResult;
                    console.log(coderesult);
                    $("#successAuth").text("Message sent");
                    $("#successAuth").show();
                }).catch(function (error) {
                    $("#error").text(error.message);
                    $("#error").show();
                });
            }
            function verify() {
                var code = $("#verification").val();
                coderesult.confirm(code).then(function (result) {
                    var user = result.user;
                    console.log(user);
                    $("#successOtpAuth").text("Auth is successful");
                    $("#successOtpAuth").show();
                }).catch(function (error) {
                    $("#error").text(error.message);
                    $("#error").show();
                });
            }
        </script>
        @yield('js')
    </body>

</html>
