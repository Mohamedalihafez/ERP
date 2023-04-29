<header class="header min-header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="container">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="/" class="navbar-brand logo home_log">
                    <img src="{{ asset('img/favicon.png') }}" alt="logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="/" class="menu-logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <li class="page_link {{is_active('home')}}" >
                        <a href="{{ route('home') }}"  > {{__('pages.Home_page')}}</a>
                    </li>

                    <li  class="page_link {{is_active('contact')}}">
                      <a href="{{ route('contact') }}">  {{__('pages.Contact Us')}}</a>
                    </li>

                    <li class="login-link">
                        <a href="login"> </a>
                    </li>
                </ul>		 
            </div>
            @guest	
                <ul class="nav header-navbar-rht">
                        <li class="nav-item">
                            <a class="nav-link header-login w-220 " href="{{ route('login') }}">{{__('pages.login')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link header-login login" href="{{ route('sign-up') }}">{{__('pages.Sign Up')}}</a>
                        </li>
                </ul>
            @else
                <ul class="nav ">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('dashboard') }}">{{ __('pages.dashboard') }}</a>
                                <a class="dropdown-item" href="{{ route('profile') }}">{{ __('pages.my_profile') }}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('pages.Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                </ul>
            @endguest
        </div>
    </nav>
</header>