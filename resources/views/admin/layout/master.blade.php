<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="currency" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="logo" content="">
        <title>TASK  @yield('title')</title>
        {{-- Font --}} 
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100;300;500;700;900&display=swap">
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin_assets/assets/img/favicon.png') }}">
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('admin_assets/assets/css/bootstrap.rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('admin_assets/assets/plugins/fontawesome/css/all.min.css') }}">
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('admin_assets/assets/css/font-awesome.min.css') }}">
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{ asset('/assets/css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/assets/css/feathericon.min.css') }}">
		<link rel="stylesheet" href="{{ asset('admin_assets/assets/plugins/morris/morris.css') }}">
		<link rel="stylesheet" href="{{ asset('admin_assets/assets/plugins/datatables/datatables.min.css') }}">
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('admin_assets/assets/css/style.css') }}">
        <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        <link rel="stylesheet"  href="https://cdn.datatables.net/searchpanes/1.3.0/css/searchPanes.dataTables.min.css">
        <link rel="stylesheet"  href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
        <link rel="stylesheet"  href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- Select 2 -->
        <link href="{{ asset('admin_assets\assets\css/select2.min.css') }}" rel="stylesheet" />

        {{-- Dropify --}}
        <link href="{{ asset('admin_assets/assets/css/fileupload.css') }}" rel="stylesheet" />

        {{-- Custom CSS --}}
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>
        <link rel="stylesheet"  href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet"  href="{{ asset('web_assets/css/style.css') }}">
    </head>
    <body>
        <div class=" loader-wrapper">
            <figure class="figure_load">
                <div class="dot white"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </figure>
        </div>
        <div class="header">
            <!-- Logo -->
            <div class="header-left">
                <a href="{{ route('dashboard') }}" class="logo">
                    <img src="{{ asset('assets/img/favicon.png') }}" class="img-fluid" alt="Logo">
                </a>
    
            </div>
            <!-- /Logo -->
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fe fe-text-align-left"></i>
            </a>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="{{ __('pages.search_here') }}">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fa fa-bars"></i>
            </a>

            <ul class="nav user-menu">

                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img"><img class="user-profile rounded-circle" src="{{ Auth::user()->picture ?
                            asset('/users/'.Auth::user()->id.'/'.Auth::user()->picture->name) :
                            asset("admin_assets/assets/img/profiles/avatar-02.jpg") }}"  width="31" alt=""></span>
                    </a>
                    <div class="dropdown-menu">
                            @guest
                            @else
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    <img src="{{ Auth::user()->picture ?
                                        asset('/users/'.Auth::user()->id.'/'.Auth::user()->picture->name) :
                                        asset("admin_assets/assets/img/profiles/avatar-02.jpg") }}"  alt="" class="avatar-img user-image rounded-circle">
                                </div>

                                <div class="user-text mt-2">
                                    <h6>  {{ Auth::user()->name }}</h6>
                                </div>
                            </div>
                            <a class="dropdown-item" href="{{ route('home') }}">{{ __('pages.home') }}</a>
                            <a class="dropdown-item" href="{{ route('profile') }}">{{ __('pages.my_profile') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('pages.logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf </form>
                            @endguest
                    </div>
                </li>
                <!-- /User Menu -->
            </ul>
            <!-- /Header Right Menu -->
        </div>
        <!-- /Header -->

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="{{ route('dashboard') }}" class="page_link {{is_active('dashboard')}} ">
                                <i class="fe fe-home"></i>
                                <span>{{ __('pages.dashboard') }}</span>
                            </a>
                        </li>
                        @if( Auth::user()->role_id == SUPERADMIN)
                        <li>
                            <a href="{{ route('product') }}" class="page_link {{is_active('product')}} ">
                                <i class="fe fe-file"></i>
                                <span>{{ __('pages.products') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user') }}" class="page_link {{is_active('user')}} ">
                                <i class="fe fe-users"></i>
                                <span>{{ __('pages.users') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('order') }}" class="page_link {{is_active('order')}} ">
                                <i class="fe fe-folder"></i>
                                <span>{{ __('pages.orders') }}</span>
                            </a>
                        </li>
                        @elseif(Auth::user()->role_id == USER)
                        <li>
                            <a href="{{ route('doctorschedule') }}" class="page_link {{is_active('doctorschedule')}} ">
                                <i class="fe fe-clock"></i>
                                <span>{{ __('pages.doctorschedule') }}</span>
                            </a>
                        </li>
                        @elseif(Auth::user()->role_id == PATIENT)
                        <li>
                            <a href="{{ route('appointment') }}" class="page_link {{is_active('appointment')}} ">
                                <i class="fe fe-clock"></i>
                                <span>{{ __('pages.appointments') }}</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
		@yield('content')
        <div class="overlay_loader justify-content-center align-items-center flex-column">
            <div class="container_loader w-25   justify-content-center align-items-center flex-column">
                <p>جاري معالجة البيانات</p>
                <span class="loader"></span>
            </div>
        </div>
        <script src="{{ asset('admin_assets/assets/js/jquery-3.6.0.min.js') }}"></script>
		<!-- Bootstrap Core JS -->

        <script src="{{ asset('admin_assets/assets/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Drag and Drop -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>
        
		<!-- Slimscroll JS -->
        <script src="{{ asset('admin_assets/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
		<script src="{{ asset('admin_assets/assets/plugins/raphael/raphael.min.js') }}"></script>
		<script src="{{ asset('admin_assets/assets/plugins/morris/morris.min.js') }}"></script>
        <script src="{{ asset('admin_assets/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	
		<!-- Filepond -->
        <script src="{{ asset('admin_assets/assets/js/filepond/filepond.min.js') }}"></script>
        <script src="{{ asset('admin_assets/assets/js/filepond/filepond.jquery.js') }}"></script>
        <script src="{{ asset('admin_assets/assets/js/filepond/filepond-plugin-image-preview.js') }}"></script>
        <script src="{{ asset('admin_assets/assets/js/filepond/filepond-plugin-image-resize.js') }}"></script>
        <script src="{{ asset('admin_assets/assets/js/filepond/filepond-plugin-image-transform.js') }}"></script>
        <script src="{{ asset('admin_assets/assets/js/filepond/filepond-plugin-file-rename.js') }}"></script>

        <!-- Select 2 -->
        <script src="{{ asset('admin_assets\assets\js\select2.min.js') }}"></script>
        <!-- Sweet Alert -->
        <script src="{{ asset('admin_assets/assets/js/sweetalert2.js') }}"></script>

        {{-- Dropify --}}
        <script src="{{ asset('admin_assets\assets\js\fileupload.js')}}"></script>

        <!-- Custom JS -->
		<script src="{{ asset('admin_assets/assets/js/script.js') }}"></script>
        <script src="{{ asset('admin_assets/assets/js/lighthouse.js') }}"></script>
        <script src="{{ asset('admin_assets/assets/js\ajaxActions.js') }}"></script>
        <script>
        $('.dropify').dropify();
            $('.btn_delete').on('click',function(){
                Swal.fire({
                    title: '{{ __("pages.slow_down") }}',
                    text: "{{ __('pages.the_deleted_data_cant_be_restored') }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{ __("pages.confirm") }}',
                    cancelButtonText: '{{ __("pages.cancel") }}'
                }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                icon: 'success',
                                title: '{{ __("pages.your_file_has_been_deleted") }}',
                            });

                            $(this).closest('.record').remove();

                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                url: $(this).attr('route'),
                                method: 'POST'
                            });
                        }
                })
            });

            $.ajax({
                url: "/verified",
                method: "post"
            })

        </script>
        <!-- loader -->
        <script>
            $(window).on("load",function(){
                $(".loader-wrapper").fadeOut("slow");
            });

            $(document).ready(function(){
                function route(){
                    return $(this).attr('route');
                }

                function placeholder(){
                    return $(this).attr('placeholder');
                }
                
                $(".select2").select2({
                    ajax: {
                        url: route,
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: function (term) {
                            return {
                            term: term
                            };
                        },
                        
                        processResults: function (response) {
                            return {
                            results: $.map(response, function(item) {
                                return {
                                    text: item.name ,
                                    id: item.id,
                                }
                            })
                        }
                        },
                        cache: true,
                        templateResult: formatRepo,
                        placeholder: placeholder,
                    },
                });

                function formatRepo (item) {
                    return item.name;
                }
            });


        </script>

        @yield('js')

        <!-- Select 2 -->
        <script src="{{ asset('admin_assets\assets\js\select2.min.js') }}"></script>
        <script src="{{asset('js/select2.js')}}"></script>
        <!-- script loader -->

    </body>
</html>
