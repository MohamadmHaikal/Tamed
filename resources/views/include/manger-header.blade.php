<?php
$enable_multi_language = get_option('multi_language', 'on');
$enable_dark_mode = get_option('dark_mode', 'on');
$current_theme = $_COOKIE['theme'];
?>
<style>

.main-container::before {
    content: "";
    height: 67px;
    
    }
</style>
<header class="header navbar navbar-expand-sm">
    <ul class="navbar-item flex-row ml-md-0 ml-auto theme-brand">
        <li class="nav-item align-self-center d-md-none">
            @include('include.logo')
        </li>
       
       
    </ul>
    <?php
        $user = get_current_user_data();
        
        ?>
    <ul class="navbar-item flex-row ml-md-auto">
        <!-- Using Switch option -->
        <li class="nav-item dropdown fullscreen-dropdown">
            <div class="switch-container mb-0 pl-0">
                <h6 style="    margin-top: 12px;
                color: white;">{{$user->name}}</h6>
            </div>
        </li>
       
        
        <li class="nav-item dropdown user-profile-dropdown">
          

           
            <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                @if (!empty($user['logo']))
                    <img src="{{ url("image/$user->logo") }}" alt="avatar">
                @else
                    <img src="{{ url('https://dummyimage.com/1200x900/e0e0e0/c7c7c7.png') }}" alt="avatar">
                @endif
                
            </a>
          
      
            <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                <div class="nav-drop is-account-dropdown">
                    <div class="inner">
                        <div class="nav-drop-header">
                            <span class="text-primary font-15"> {{ __('backend.Welcome') }} {{ $user['name'] }}
                                !</span>
                        </div>
                        <div class="nav-drop-body account-items pb-0">
                            <a id="profile-link" class="account-item" href="{{ route('profile') }}">
                                <div class="media align-center">
                                    <div class="media-left">
                                        <div class="image">
                                            @if (!empty($user['logo']))
                                                <img class="rounded-circle avatar-xs"
                                                    src="{{ url("image/$user->logo") }}" alt="">
                                            @else
                                                <img class="rounded-circle avatar-xs"
                                                    src="{{ url('https://dummyimage.com/1200x900/e0e0e0/c7c7c7.png') }}"
                                                    alt="">
                                            @endif

                                        </div>
                                    </div>
                                    <div class="media-content ml-0">
                                        <h6 class="font-13 mb-0 strong">{{ $user['name'] }}</h6>
                                        <small>{{ $user['email'] }}</small>
                                    </div>
                                    <div class="media-right">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </a>
                            <a class="account-item" href="{{ route('profile') }}">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-user font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong"> {{ __('backend.My Account') }}</h6>
                                    </div>
                                </div>
                            </a>
                            {{-- <a class="account-item" href="{{ url('/pages/timeline') }}">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-briefcase font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong">{{ __('My Activity') }}</h6>
                                    </div>
                                </div>
                            </a> --}}
                            <a class="account-item " href="/">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-home font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong">{{ __('backend.Go to home page') }}</h6>
                                    </div>
                                </div>
                            </a>
                            {{-- <a class="account-item" href="{{ url('/authentications/style3/locked') }}">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-lock font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong">{{ __('Lock Screen') }}</h6>
                                    </div>
                                </div>
                            </a> --}}
                            <hr class="account-divider">
                            <a class="account-item" href="{{ route('get.logout') }}">
                                <div class="media align-center">
                                    <div class="icon-wrap">
                                        <i class="las la-sign-out-alt font-20"></i>
                                    </div>
                                    <div class="media-content ml-3">
                                        <h6 class="font-13 mb-0 strong ">{{ __('backend.Logout') }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <ul class="navbar-item flex-row">
        <li class="nav-item dropdown header-setting">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle rightbarCollapse" data-placement="bottom">
                {{-- <i class="las la-sliders-h"></i> --}}
            </a>
        </li>
    </ul>
</header>
