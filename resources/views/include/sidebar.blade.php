<?php
$user = get_current_user_data();
?>
<nav id="sidebar">
    <div class="fixed-profile">
        <div class="premium-border">
            @if (!empty($user['logo']))
                <img src="{{ url("image/$user->logo") }}" class="profile-avatar" />
            @else
                <img src="{{ url('https://dummyimage.com/1200x900/e0e0e0/c7c7c7.png') }}" class="profile-avatar" />
            @endif

        </div>
        <div class="mt-3">
            <h6 class="text-white font-14 mb-1">{{ $user->name }}</h6>

        </div>
        <br>
        <ul class="flex-row profile-option-container">
            <li class="option-item dropdown message-dropdown">
                <div class="option-link-container dropdown-toggle" id="messageDropdown" 
                    aria-haspopup="true" aria-expanded="false">
                    <a class="option-link dropdown-toggle" href="{{route('chat')}}" >
                        <i class="las la-envelope"></i>
                    </a>
                    <a href="{{route('chat')}}">
                        <div class="text-left">
                            <h6>{{__('backend.mail')}}</h6>
                            <p>{{get_current_user_message_count()}} {{__("backend.New Mails")}}</p>
                        </div>
                    </a>
                    
                </div>
                <div class="dropdown-menu position-absolute md-container" aria-labelledby="messageDropdown">
                    <div class="nav-drop is-notification-dropdown">
                        <div class="inner">
                            <div class="nav-drop-header">
                                <span class="text-black font-12 strong">3 new mails</span>
                                <a class="text-muted font-12" href="#">
                                    Mark all read
                                </a>
                            </div>
                            <div class="nav-drop-body account-items pb-0">
                                <a class="account-item">
                                    <div class="media">
                                        <div class="user-img">
                                            <img class="rounded-circle avatar-xs" src="assets/img/profile-11.jpg"
                                                alt="profile">
                                        </div>
                                        <div class="media-body">
                                            <div class="">
                                                <h6 class="text-dark font-13 mb-0 strong">Jennifer Queen</h6>
                                                <p class="m-0 mt-1 font-10 text-muted">Permission Required</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="account-item marked-read">
                                    <div class="media">
                                        <div class="user-img">
                                            <img class="rounded-circle avatar-xs" src="assets/img/profile-10.jpg"
                                                alt="profile">
                                        </div>
                                        <div class="media-body">
                                            <div class="">
                                                <h6 class="text-dark font-13 mb-0 strong">Lara Smith</h6>
                                                <p class="m-0 mt-1 font-10 text-muted">Invoice needed</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="account-item marked-read">
                                    <div class="media">
                                        <div class="user-img">
                                            <img class="rounded-circle avatar-xs" src="assets/img/profile-9.jpg"
                                                alt="profile">
                                        </div>
                                        <div class="media-body">
                                            <div class="">
                                                <h6 class="text-dark font-13 mb-0 strong">Victoria Williamson</h6>
                                                <p class="m-0 mt-1 font-10 text-muted">Account need to be synced</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <hr class="account-divider">
                                <div class="text-center">
                                    <a class="text-primary strong font-13" href="apps_mail.html">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="option-item dropdown notification-dropdown">
                <a class="option-link-container" href="#">
                    <div class="option-link">
                        <i class="las la-bell"></i>
                        <div class="blink">
                            <div class="circle"></div>
                        </div>
                    </div>
                    <div class="text-left">
                        <h6>{{__('backend.notifications')}}</h6>
                        <p>4 {{__("backend.Unread")}}</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>

    <ul class="list-unstyled menu-categories" id="accordionExample">
        <li class="menu ">
            <a data-active={{ is_active_route(['dashboard/*']) }} href="javascript:void(0);" id="dashboard"
                class="main-item dropdown-toggle">
                <i class="las la-home"></i>
                <span>{{ __('backend.dashboard') }}</span>
            </a>
        </li>

        <li class="menu {{ active_class(['addItem/*']) }}">
            <a data-active={{ is_active_route(['addItem/*']) }} href="javascript:void(0);" id="addItem"
                class="main-item dropdown-toggle">
                <span class="new-notification"></span>
                <i class="las la-plus"></i>
                <span>{{ __('backend.Add Item') }}</span>
            </a>
        </li>
        <li class="menu {{ is_active_route(['users/*']) }}">
            <a data-active={{ is_active_route(['users/*']) }} href="javascript:void(0);" id="users"
                class="main-item dropdown-toggle">
                <i class="las la-user "></i>
                <span>{{ __('backend.users') }}</span>
            </a>
        </li>
        <li class="menu {{ active_class(['languages/*']) }}">
            <a href="{{ route('languages.translations.index', ['ar']) }}"
                data-active={{ is_active_route(['languages/*']) }} class="dropdown-toggle">
                <i class="las la-language"></i>
                <span> {{ __('backend.Translation') }}</span>
            </a>
        </li>
        <li class="menu">
            <a data-active={{ is_active_route(['ads/*']) }} href="javascript:void(0);" id="ads"
                class="main-item dropdown-toggle">
                <i class="las la-file"></i>
                <span>{{ __('backend.ads') }}</span>
            </a>
        </li>
        <li class="menu {{ active_class(['Notifications/*']) }}">
            <a href="/pages/notifications"
                data-active={{ is_active_route(['Notifications/*']) }} class="dropdown-toggle">
                <i class="las la-bell"></i>
                <span> {{ __('backend.notifications') }}</span>
            </a>
        </li>
        <li class="menu">
            <a data-active={{ is_active_route(['apps/*']) }} href="javascript:void(0);" id="apps"
                class="main-item dropdown-toggle">
                <i class="lab la-medapps"></i>
                <span>{{ __('Apps') }}</span>
            </a>
        </li>
        <li class="menu {{ active_class(['authentications/*']) }}">
            <a data-active={{ is_active_route(['authentications/*']) }} href="javascript:void(0);" id="authPages"
                class="main-item dropdown-toggle">
                <span class="new-notification"></span>
                <i class="las la-lock"></i>
                <span>{{ __('Auth Pages') }}</span>
            </a>
        </li>

        <li class="menu {{ active_class(['pages/*']) }}">
            <a data-active={{ is_active_route(['pages/*']) }} href="javascript:void(0);" id="otherPages"
                class="main-item dropdown-toggle">
                <i class="las la-file"></i>
                <span>{{ __('Other Pages') }}</span>
            </a>
        </li>
        <li class="menu {{ active_class(['basic-ui/*']) }}">
            <a data-active={{ is_active_route(['basic-ui/*']) }} href="javascript:void(0);" id="basicUI"
                class="main-item dropdown-toggle">
                <i class="las la-drafting-compass"></i>
                <span>{{ __('Basic UI') }}</span>
            </a>
        </li>
        <li class="menu {{ active_class(['ui-elements/*']) }}">
            <a data-active={{ is_active_route(['ui-elements/*']) }} href="javascript:void(0);" id="uiElements"
                class="main-item dropdown-toggle">
                <i class="lab la-elementor"></i>
                <span>{{ __('UI Elements') }}</span>
            </a>
        </li>
        <li class="menu {{ active_class(['forms/*']) }}">
            <a data-active={{ is_active_route(['forms/*']) }} href="javascript:void(0);" id="forms"
                class="main-item dropdown-toggle">
                <i class="lab la-wpforms"></i>
                <span>{{ __('Forms') }}</span>
            </a>
        </li>
        <li class="menu {{ active_class(['maps/*']) }}">
            <a data-active={{ is_active_route(['maps/*']) }} href="javascript:void(0);" id="maps"
                class="main-item dropdown-toggle">
                <i class="las la-globe-americas"></i>
                <span>{{ __('Maps') }}</span>
            </a>
        </li>
        <li class="menu {{ active_class(['charts/*']) }}">
            <a data-active={{ is_active_route(['charts/*']) }} href="javascript:void(0);" id="charts"
                class="main-item dropdown-toggle">
                <i class="las la-chart-pie"></i>
                <span>{{ __('Charts') }}</span>
            </a>
        </li>
        <li class="menu">
            <a href="{{ url('/widgets') }}" data-active={{ is_active_route(['widgets']) }}
                class="dropdown-toggle">
                <i class="las la-desktop"></i>
                <span>{{ __('Widgets') }}</span>
            </a>
        </li>
        <li class="menu">
            <a href="{{ url('/tables') }}" data-active={{ is_active_route(['tables']) }} class="dropdown-toggle">
                <i class="las la-border-all"></i>
                <span>{{ __('Tables') }}</span>
            </a>
        </li>
        <li class="menu">
            <a href="{{ url('/data-tables') }}" data-active={{ is_active_route(['data-tables']) }}
                class="dropdown-toggle">
                <i class="las la-table"></i>
                <span>{{ __('Data Tables') }}</span>
            </a>
        </li>
        <li class="menu {{ active_class(['starter/*']) }}">
            <a data-active={{ is_active_route(['starter/*']) }} href="javascript:void(0);" id="starterKit"
                class="main-item dropdown-toggle">
                <i class="las la-copy"></i>
                <span>{{ __('Starter Kit') }}</span>
            </a>
        </li>
        <li class="menu">
            <a href="javascript:void(0);" id="multiLevel" class="main-item dropdown-toggle">
                <i class="las la-sitemap"></i>
                <span>{{ __('Multi Levels') }}</span>
            </a>
        </li>
        <li class="menu">
            <a href="http://neptuneweb.xyz" class="dropdown-toggle">
                <i class="las la-file-code"></i>
                <span> {{ __('Documentation') }}</span>
            </a>
        </li>

    </ul>
    <div class="sidebar-submenu">
        <span class="sidebar-submenu-close" id="sidebarSubmenuClose">
            <i class="las la-times"></i>
        </span>
        <div class="submenu" id="dashboardMenu">
            <div class="submenu-info">
                <div class="submenu-inner-info">
                    <h5 class="mb-3">Dashboard</h5>
                    <p>Lorem ipsum dolor sit sed ametctetur elit.</p>
                </div>
                <ul class="submenu-list">
                    <li class="{{ active_class(['dashboard/dashboard1']) }}">
                        <a class="app-submenu" href="{{ url('/dashboard/dashboard1') }}"> Dashboard 1 </a>
                    </li>
                    <li class="{{ active_class(['dashboard/dashboard2']) }}">
                        <a class="app-submenu" href="{{ url('/dashboard/dashboard2') }}"> Dashboard 2 </a>
                    </li>
                    <li class="{{ active_class(['dashboard/dashboard3']) }}">
                        <a class="app-submenu" href="{{ url('/dashboard/dashboard3') }}"> Dashboard 3 </a>
                    </li>
                    <li class="{{ active_class(['dashboard/dashboard4']) }}">
                        <a class="app-submenu" href="{{ url('/dashboard/dashboard4') }}"> Dashboard 4 </a>
                    </li>
                    <li class="{{ active_class(['dashboard/dashboard5']) }}">
                        <a class="app-submenu" href="{{ url('/dashboard/dashboard5') }}"> Dashboard 5 </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="submenu" id="addItemMenu">
            <div class="submenu-info">
                <div class="submenu-inner-info">
                    <h5 class="mb-3">{{ __('backend.add') }} </h5>
                </div>
                <ul class="submenu-list" data-parent-element="#dashboard">
                    <li>
                        <a data-toggle="collapse" href="#authTypeOne" role="button" aria-expanded="false"
                            aria-controls="collapseExample"
                            class="dropdown-toggle {{ active_class(['authentication/style1/*']) }}">
                            {{ __('backend.MaterialType') }} <i class="las la-angle-right sidemenu-right-icon"></i>
                        </a>
                        <ul class="sub-submenu-list collapse" id="authTypeOne">
                            <li class=" {{ active_class(['authentication/style3/login']) }}">
                                <a href="{{ route('Item','MaterialType') }}"> {{ __('backend.Material') }} </a>
                            </li>
                           

                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#authTypeTwo" role="button" aria-expanded="false"
                            aria-controls="collapseExample"
                            class="dropdown-toggle {{ active_class(['authentication/style2/*']) }}">
                            {{ __('backend.ProjectType') }}<i class="las la-angle-right sidemenu-right-icon"></i>
                        </a>
                        <ul class="sub-submenu-list collapse" id="authTypeTwo">
                            <li class=" {{ active_class(['authentication/style3/login']) }}">
                                <a href="{{ route('Item','ProjectType') }}"> {{ __('backend.project') }} </a>
                            </li>
                           

                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#authTypeThree" role="button" aria-expanded="false"
                            aria-controls="collapseExample"
                            class="dropdown-toggle {{ active_class(['authentication/style3/*']) }}">

                          


                            {{ __('backend.TypeEmployment') }}<i class="las la-angle-right sidemenu-right-icon"></i>
                            

                        </a>
                        <ul class="sub-submenu-list collapse" id="authTypeThree">
                            <li class=" {{ active_class(['authentication/style3/login']) }}">
                                <a href="{{ route('Item','TypeEmployment') }}"> {{ __('backend.employment') }} </a>
                            </li>
                

                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#Activities" role="button" aria-expanded="false"
                            aria-controls="collapseExample"
                            class="dropdown-toggle {{ active_class(['authentication/style3/*']) }}">
                            {{ __('backend.Activities') }} <i class="las la-angle-right sidemenu-right-icon"></i>
                        </a>
                        <ul class="sub-submenu-list collapse" id="Activities">

                            <li class=" {{ active_class(['authentication/style3/login']) }}">
                                <a href="{{ route('Item','Activitie') }}"> {{ __('backend.Activities') }} </a>
                            </li>



                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#AdditionalActivitie" role="button" aria-expanded="false"
                            aria-controls="collapseExample"
                            class="dropdown-toggle {{ active_class(['authentication/style3/*']) }}">
                            {{ __('backend.Additional Activitie') }} <i
                                class="las la-angle-right sidemenu-right-icon"></i>
                        </a>
                        <ul class="sub-submenu-list collapse" id="AdditionalActivitie">

                            <li class=" {{ active_class(['authentication/style3/login']) }}">
                                <a href="{{ route('Item','AdditionalActivitie') }}">
                                    {{ __('backend.Additional Activitie') }} </a>
                            </li>



                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#services" role="button" aria-expanded="false"
                            aria-controls="collapseExample"
                            class="dropdown-toggle {{ active_class(['authentication/style3/*']) }}">
                            {{ __('backend.Service') }} <i
                                class="las la-angle-right sidemenu-right-icon"></i>
                        </a>
                        <ul class="sub-submenu-list collapse" id="services">

                            <li class=" {{ active_class(['authentication/style3/login']) }}">
                                <a href="{{ route('Item','Service') }}"> {{ __('backend.Service') }}
                                </a>
                            </li>



                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#userType" role="button" aria-expanded="false"
                            aria-controls="collapseExample"
                            class="dropdown-toggle {{ active_class(['authentication/style3/*']) }}">
                            {{ __('backend.UserType') }} <i
                                class="las la-angle-right sidemenu-right-icon"></i>
                        </a>
                        <ul class="sub-submenu-list collapse" id="userType">

                            <li class=" {{ active_class(['authentication/style3/login']) }}">
                                <a href="{{ route('Item','UserType') }}"> {{ __('backend.UserType') }}
                                </a>
                            </li>



                        </ul>
                    </li>


                </ul>
            </div>
        </div>
        <div class="submenu" id="appsMenu">
            <div class="submenu-info">
                <div class="submenu-inner-info">
                    <h5 class="mb-3">Apps</h5>
                    <p>Sed ut perspiciatis unde omnis iste.</p>
                </div>
                <ul class="submenu-list">
                    <li class=" {{ active_class(['apps/calendar']) }}">
                        <a href="{{ url('/apps/calendar') }}"> Calender </a>
                    </li>
                    <li class=" {{ active_class(['apps/chat']) }}">
                        <a href="{{ url('/apps/chat') }}"> Chat </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#appsCompanies" role="button" aria-expanded="false"
                            aria-controls="collapseExample"
                            class="dropdown-toggle {{ active_class(['apps/companies/*']) }}">
                            Companies <i class="las la-angle-right sidemenu-right-icon"></i>
                        </a>
                        <ul class="sub-submenu-list collapse" id="appsCompanies">
                            <li class=" {{ active_class(['apps/companies/lists']) }}">
                                <a href="{{ url('/apps/companies/lists') }}"> List </a>
                            </li>
                            <li class=" {{ active_class(['apps/companies/company-details']) }}">
                                <a href="{{ url('/apps/companies/company-details') }}"> Company Details </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" {{ active_class(['apps/contacts']) }}">
                        <a href="{{ url('/apps/contacts') }}"> Contacts </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#appsEcommerce" role="button" aria-expanded="false"
                            aria-controls="collapseExample"
                            class="dropdown-toggle {{ active_class(['apps/ecommerce/*']) }}">
                            Ecommerce <i class="las la-angle-right sidemenu-right-icon"></i>
                        </a>
                        <ul class="sub-submenu-list collapse" id="appsEcommerce">
                            <li class=" {{ active_class(['apps/ecommerce/dashboard']) }}">
                                <a href="{{ url('/apps/ecommerce/dashboard') }}"> Dashboard </a>
                            </li>
                            <li class=" {{ active_class(['apps/ecommerce/products']) }}">
                                <a href="{{ url('/apps/ecommerce/products') }}"> Products </a>
                            </li>
                            <li class=" {{ active_class(['apps/ecommerce/product-details']) }}">
                                <a href="{{ url('/apps/ecommerce/product-details') }}"> Product Details </a>
                            </li>
                            <li class=" {{ active_class(['apps/ecommerce/add-product']) }}">
                                <a href="{{ url('/apps/ecommerce/add-product') }}"> Add Product </a>
                            </li>
                            <li class=" {{ active_class(['apps/ecommerce/order']) }}">
                                <a href="{{ url('/apps/ecommerce/orders') }}"> Orders </a>
                            </li>
                            <li class=" {{ active_class(['apps/ecommerce/order-details']) }}">
                                <a href="{{ url('/apps/ecommerce/order-details') }}"> Order Details </a>
                            </li>
                            <li class=" {{ active_class(['apps/ecommerce/customers']) }}">
                                <a href="{{ url('/apps/ecommerce/customers') }}"> Customers </a>
                            </li>
                            <li class=" {{ active_class(['apps/ecommerce/sellers']) }}">
                                <a href="{{ url('/apps/ecommerce/sellers') }}"> Sellers </a>
                            </li>
                            <li class=" {{ active_class(['apps/ecommerce/cart']) }}">
                                <a href="{{ url('/apps/ecommerce/cart') }}"> Cart </a>
                            </li>
                            <li class=" {{ active_class(['apps/ecommerce/checkout']) }}">
                                <a href="{{ url('/apps/ecommerce/checkout') }}"> Checkout </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#appsEmail" role="button" aria-expanded="false"
                            aria-controls="collapseExample"
                            class="dropdown-toggle {{ active_class(['apps/email/*']) }}">
                            Email <i class="las la-angle-right sidemenu-right-icon"></i>
                        </a>
                        <ul class="sub-submenu-list collapse" id="appsEmail">
                            <li class=" {{ active_class(['apps/email/inbox']) }}">
                                <a href="{{ url('/apps/email/inbox') }}"> Inbox </a>
                            </li>
                            <li class=" {{ active_class(['apps/email/details']) }}">
                                <a href="{{ url('/apps/email/details') }}"> Email Details </a>
                            </li>
                            <li class=" {{ active_class(['apps/email/compose']) }}">
                                <a href="{{ url('/apps/email/compose') }}"> Compose Email </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" {{ active_class(['apps/file-manager']) }}">
                        <a href="{{ url('/apps/file-manager') }}"> File Manager </a>
                    </li>
                    <li class=" {{ active_class(['apps/invoice-list']) }}">
                        <a href="{{ url('/apps/invoice-list') }}"> Invoice List </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#appsNotes" role="button" aria-expanded="false"
                            aria-controls="collapseExample"
                            class="dropdown-toggle {{ active_class(['apps/notes/*']) }}">
                            Notes <i class="las la-angle-right sidemenu-right-icon"></i>
                        </a>
                        <ul class="sub-submenu-list collapse" id="appsNotes">
                            <li class=" {{ active_class(['apps/notes/list']) }}">
                                <a href="{{ url('/apps/notes/list') }}"> List </a>
                            </li>
                            <li class=" {{ active_class(['apps/notes/details']) }}">
                                <a href="{{ url('/apps/notes/details') }}"> Note Details </a>
                            </li>
                            <li class=" {{ active_class(['apps/notes/create']) }}">
                                <a href="{{ url('/apps/notes/create') }}"> Creat Note </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" {{ active_class(['apps/social']) }}">
                        <a href="{{ url('/apps/social') }}"> Social </a>
                    </li>
                    <li class=" {{ active_class(['apps/task-list']) }}">
                        <a href="{{ url('/apps/task-list') }}"> Task List </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#appsTickets" role="button" aria-expanded="false"
                            aria-controls="collapseExample"
                            class="dropdown-toggle {{ active_class(['apps/tickets/*']) }}">
                            Tickets <i class="las la-angle-right sidemenu-right-icon"></i>
                        </a>
                        <ul class="sub-submenu-list collapse" id="appsTickets">
                            <li class=" {{ active_class(['apps/tickets/list']) }}">
                                <a href="{{ url('/apps/tickets/list') }}"> Ticket List </a>
                            </li>
                            <li class=" {{ active_class(['apps/tickets/details']) }}">
                                <a href="{{ url('/apps/tickets/details') }}"> Ticket Details </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="submenu" id="adsMenu">
            <div class="submenu-info">
                <div class="submenu-inner-info">
                    <h5 class="mb-3">{{__('backend.ads')}}</h5>
                </div>
                <ul class="submenu-list">
                    <li class=" {{ active_class(['ads/add']) }}">
                        <a href="{{ url('ads/add') }}"> {{__('backend.Add Ads')}} </a>
                    </li>
                    <li class=" {{ active_class(['ads/all']) }}">
                        <a href="{{ url('ads/all') }}"> {{__('backend.All Ads')}} </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="submenu" id="usersMenu">
            <div class="submenu-info">
                <div class="submenu-inner-info">
                    <h5 class="mb-3">{{ __('backend.users') }}</h5>

                </div>
                <ul class="submenu-list">
                    <li class=" {{ active_class(['users/all']) }}">
                        <a href="{{route('users.all')}}"> {{ __('backend.all users') }} </a>
                    </li>
                    <li class=" {{ active_class(['users/chat']) }}">
                        <a href="{{ url('/apps/chat') }}"> {{ __('backend.users types') }}</a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="submenu" id="authPagesMenu">
            <div class="submenu-info">
                <div class="submenu-inner-info">
                    <h5 class="mb-3">Auth Pages</h5>
                    <p>Quis autem vel eum iure reprehenderit.</p>
                </div>
                <ul class="submenu-list" data-parent-element="#dashboard">
                    <li>
                        <a data-toggle="collapse" href="#authTypeOne" role="button" aria-expanded="false"
                            aria-controls="collapseExample"
                            class="dropdown-toggle {{ active_class(['authentication/style1/*']) }}">
                            Type 1 <i class="las la-angle-right sidemenu-right-icon"></i>
                        </a>
                        <ul class="sub-submenu-list collapse" id="authTypeOne">
                            <li class=" {{ active_class(['authentication/style1/login']) }}">
                                <a href="{{ url('/authentication/style1/login') }}"> Login </a>
                            </li>
                            <li class=" {{ active_class(['authentication/style1/register']) }}">
                                <a href="{{ url('/authentication/style1/register') }}"> Register </a>
                            </li>
                            <li class=" {{ active_class(['authentication/style1/locked']) }}">
                                <a href="{{ url('/authentication/style1/locked') }}"> Lock Screen </a>
                            </li>
                            <li class=" {{ active_class(['authentication/style1/forgot-password']) }}">
                                <a href="{{ url('/authentication/style1/fotgot-password') }}"> Forget Password </a>
                            </li>
                            <li class=" {{ active_class(['authentication/style1/confirm-email']) }}">
                                <a href="{{ url('/authentication/style1/confirm-email') }}"> Confirm Email </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#authTypeTwo" role="button" aria-expanded="false"
                            aria-controls="collapseExample"
                            class="dropdown-toggle {{ active_class(['authentication/style2/*']) }}">
                            Type 2 <i class="las la-angle-right sidemenu-right-icon"></i>
                        </a>
                        <ul class="sub-submenu-list collapse" id="authTypeTwo">
                            <li class=" {{ active_class(['authentication/style2/login']) }}">
                                <a href="{{ url('/authentication/style1/login') }}"> Login </a>
                            </li>
                            <li class=" {{ active_class(['authentication/style2/register']) }}">
                                <a href="{{ url('/authentication/style2/register') }}"> Register </a>
                            </li>
                            <li class=" {{ active_class(['authentication/style2/locked']) }}">
                                <a href="{{ url('/authentication/style2/locked') }}"> Lock Screen </a>
                            </li>
                            <li class=" {{ active_class(['authentication/style2/forgot-password']) }}">
                                <a href="{{ url('/authentication/style2/forgot-password') }}"> Forget Password </a>
                            </li>
                            <li class=" {{ active_class(['authentication/style2/confirm-email']) }}">
                                <a href="{{ url('/authentication/style2/confirm-email') }}"> Confirm Email </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#authTypeThree" role="button" aria-expanded="false"
                            aria-controls="collapseExample"
                            class="dropdown-toggle {{ active_class(['authentication/style3/*']) }}">
                            Type 3
                            <span class="menu-badge badge-danger">New</span>
                        </a>
                        <ul class="sub-submenu-list collapse" id="authTypeThree">
                            <li class=" {{ active_class(['authentication/style3/login']) }}">
                                <a href="{{ url('/authentication/style3/login') }}"> Login </a>
                            </li>
                            <li class=" {{ active_class(['authentication/style3/register']) }}">
                                <a href="{{ url('/authentication/style3/register') }}"> Register </a>
                            </li>
                            <li class=" {{ active_class(['authentication/style3/locked']) }}">
                                <a href="{{ url('/authentication/style3/locked') }}"> Lock Screen </a>
                            </li>
                            <li class=" {{ active_class(['authentication/style3/forgot-password']) }}">
                                <a href="{{ url('/authentication/style3/forgot-password') }}"> Forget Password </a>
                            </li>
                            <li class=" {{ active_class(['authentication/style3/confirm-email']) }}">
                                <a href="{{ url('/authentication/style3/confirm-email') }}"> Confirm Email </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="submenu" id="otherPagesMenu">
            <div class="submenu-info">
                <div class="submenu-inner-info">
                    <h5 class="mb-3">Other Pages</h5>
                    <p>Nor again is there anyone who loves or pursues.</p>
                </div>
                <ul class="submenu-list">
                    <li class=" {{ active_class(['pages/comming-soon']) }}">
                        <a href="{{ url('/pages/comming-soon') }}"> Coming Soon </a>
                    </li>
                    <li class=" {{ active_class(['pages/comming-soon2']) }}">
                        <a href="{{ url('/pages/comming-soon2') }}"> Coming Soon 2 </a>
                    </li>
                    <li class=" {{ active_class(['pages/contact-form']) }}">
                        <a href="{{ url('/pages/contact-form') }}"> Contact Form </a>
                    </li>
                    <li class=" {{ active_class(['pages/contact-form2']) }}">
                        <a href="{{ url('/pages/contact-form2') }}"> Contact Form 2 </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#otherPagesError" role="button" aria-expanded="false"
                            aria-controls="collapseExample"
                            class="dropdown-toggle {{ active_class(['pages/error/*']) }}">
                            Error <i class="las la-angle-right sidemenu-right-icon"></i>
                        </a>
                        <ul class="sub-submenu-list collapse" id="otherPagesError">
                            <li>
                                <a href="pages_error404.html"> 404 </a>
                            </li>
                            <li>
                                <a href="pages_error500.html"> 500 </a>
                            </li>
                            <li>
                                <a href="pages_error503.html"> 503 </a>
                            </li>
                            <li>
                                <a href="pages_maintenance.html"> Maintenance </a>
                            </li>
                            <li>
                                <a href="pages_error404_2.html"> 404 Two </a>
                            </li>
                            <li>
                                <a href="pages_error500_2.html"> 500 Two </a>
                            </li>
                            <li>
                                <a href="pages_error503_2.html"> 503 Two </a>
                            </li>
                            <li>
                                <a href="pages_maintenance_2.html"> Maintenance Two </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" {{ active_class(['pages/faq']) }}">
                        <a href="{{ url('/pages/faq') }}"> FAQ </a>
                    </li>
                    <li class=" {{ active_class(['pages/faq2']) }}">
                        <a href="{{ url('/pages/faq2') }}"> FAQ 2 </a>
                    </li>
                    <li class=" {{ active_class(['pages/faq3']) }}">
                        <a href="{{ url('/pages/faq3') }}"> FAQ 3 </a>
                    </li>
                    <li class=" {{ active_class(['pages/helpdesk']) }}">
                        <a href="{{ url('/pages/helpdesk') }}"> Helpdesk </a>
                    </li>
                    <li class=" {{ active_class(['pages/notifications']) }}">
                        <a href="{{ url('/pages/notifications') }}"> Notifications </a>
                    </li>
                    <li class=" {{ active_class(['pages/pricing']) }}">
                        <a href="{{ url('/pages/pricing') }}"> Pricing </a>
                    </li>
                    <li class=" {{ active_class(['pages/pricing2']) }}">
                        <a href="{{ url('/pages/pricing2') }}"> Pricing 2 </a>
                    </li>
                    <li class=" {{ active_class(['pages/privacy-policy']) }}">
                        <a href="{{ url('/pages/privacy-policy') }}"> Privacy Policy </a>
                    </li>
                    <li class=" {{ active_class(['pages/profile']) }}">
                        <a href="{{ url('/pages/profile') }}"> Profile </a>
                    </li>
                    <li class=" {{ active_class(['pages/profile-edit']) }}">
                        <a href="{{ url('/pages/profile-edit') }}"> Profile Edit </a>
                    </li>
                    <li class=" {{ active_class(['pages/search-result']) }}">
                        <a href="{{ url('/pages/search-result') }}"> Search Result </a>
                    </li>
                    <li class=" {{ active_class(['pages/search-result2']) }}">
                        <a href="{{ url('/pages/search-result2') }}"> Search Result 2 </a>
                    </li>
                    <li class=" {{ active_class(['pages/sitemap']) }}">
                        <a href="{{ url('/pages/sitemap') }}"> Sitemap </a>
                    </li>
                    <li class=" {{ active_class(['pages/timeline']) }}">
                        <a href="{{ url('/pages/timeline') }}"> Timeline </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="submenu" id="basicUIMenu">
            <div class="submenu-info">
                <div class="submenu-inner-info">
                    <h5 class="mb-3">Basic UI</h5>
                    <p>At vero eos et accusamus et iusto odio.</p>
                </div>
                <ul class="submenu-list">
                    <li class=" {{ active_class(['basic-ui/accordions']) }}">
                        <a href="{{ url('/basic-ui/accordions') }}"> Accordions </a>
                    </li>
                    <li class=" {{ active_class(['basic-ui/animation']) }}">
                        <a href="{{ url('/basic-ui/animation') }}"> Animation </a>
                    </li>
                    <li class=" {{ active_class(['basic-ui/cards']) }}">
                        <a href="{{ url('/basic-ui/cards') }}"> Bootstrap Cards </a>
                    </li>
                    <li class=" {{ active_class(['basic-ui/carousel']) }}">
                        <a href="{{ url('/basic-ui/carousel') }}">Carousel</a>
                    </li>
                    <li class=" {{ active_class(['basic-ui/countdown']) }}">
                        <a href="{{ url('/basic-ui/countdown') }}"> Countdown </a>
                    </li>
                    <li class=" {{ active_class(['basic-ui/counter']) }}">
                        <a href="{{ url('/basic-ui/counter') }}"> Counter </a>
                    </li>
                    <li class=" {{ active_class(['basic-ui/dragitems']) }}">
                        <a href="{{ url('/basic-ui/dragitems') }}">Drag Items</a>
                    </li>
                    <li class=" {{ active_class(['basic-ui/lightbox']) }}">
                        <a href="{{ url('/basic-ui/lightbox') }}"> Lightbox </a>
                    </li>
                    <li class=" {{ active_class(['basic-ui/lightbox-sideopen']) }}">
                        <a href="{{ url('/basic-ui/lightbox-sideopen') }}"> Lightbox Side Open</a>
                    </li>
                    <li class=" {{ active_class(['basic-ui/list-groups']) }}">
                        <a href="{{ url('/basic-ui/list-group') }}"> List Group </a>
                    </li>
                    <li class=" {{ active_class(['basic-ui/media-object']) }}">
                        <a href="{{ url('/basic-ui/media-object') }}"> Media Object </a>
                    </li>
                    <li class=" {{ active_class(['basic-ui/modals']) }}">
                        <a href="{{ url('/basic-ui/modals') }}"> Modals </a>
                    </li>
                    <li class=" {{ active_class(['basic-ui/notifications']) }}">
                        <a href="{{ url('/basic-ui/notifications') }}"> Notifications </a>
                    </li>
                    <li class=" {{ active_class(['basic-ui/scrollspy']) }}">
                        <a href="{{ url('/basic-ui/scrollspy') }}"> Scroll Spy </a>
                    </li>
                    <li class=" {{ active_class(['basic-ui/session-timeout']) }}">
                        <a href="{{ url('/basic-ui/session-timeout') }}"> Session Timeout </a>
                    </li>
                    <li class=" {{ active_class(['basic-ui/sweet-alerts']) }}">
                        <a href="{{ url('/basic-ui/sweet-alerts') }}"> Sweet Alerts </a>
                    </li>
                    <li class=" {{ active_class(['basic-ui/tabs']) }}">
                        <a href="{{ url('/basic-ui/tabs') }}"> Tabs </a>
                    </li>
                    <li class=" {{ active_class(['basic-ui/tour-tutorial']) }}">
                        <a href="{{ url('/basic-ui/tour-tutorial') }}"> Tour Tutorial </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="submenu" id="uiElementsMenu">
            <div class="submenu-info">
                <div class="submenu-inner-info">
                    <h5 class="mb-3">UI Elements</h5>
                    <p>Our being able to do what we like best.</p>
                </div>
                <ul class="submenu-list">
                    <li class=" {{ active_class(['ui-element/alerts']) }}">
                        <a href="{{ url('/ui-elements/alerts') }}"> Alerts </a>
                    </li>
                    <li class=" {{ active_class(['ui-element/avatar']) }}">
                        <a href="{{ url('/ui-elements/avatar') }}"> Avatar </a>
                    </li>
                    <li class=" {{ active_class(['ui-element/badges']) }}">
                        <a href="{{ url('/ui-elements/badges') }}"> Badges </a>
                    </li>
                    <li class=" {{ active_class(['ui-element/breadcrumbs']) }}">
                        <a href="{{ url('/ui-elements/breadcrumbs') }}"> Breadcrumbs </a>
                    </li>
                    <li class=" {{ active_class(['ui-element/buttons']) }}">
                        <a href="{{ url('/ui-elements/buttons') }}"> Buttons </a>
                    </li>
                    <li class=" {{ active_class(['ui-element/colors']) }}">
                        <a href="{{ url('/ui-elements/colors') }}"> Colors </a>
                    </li>
                    <li class=" {{ active_class(['ui-element/dropdown']) }}">
                        <a href="{{ url('/ui-elements/dropdown') }}"> Dropdown </a>
                    </li>
                    <li class=" {{ active_class(['ui-element/grid']) }}">
                        <a href="{{ url('/ui-elements/grid') }}"> Grid </a>
                    </li>
                    <li class=" {{ active_class(['ui-element/jumbotron']) }}">
                        <a href="{{ url('/ui-elements/jumbotron') }}"> Jumbotron </a>
                    </li>
                    <li class=" {{ active_class(['ui-element/list-group']) }}">
                        <a href="{{ url('/ui-elements/list-group') }}"> List Group </a>
                    </li>
                    <li class=" {{ active_class(['ui-element/loading-spinners']) }}">
                        <a href="{{ url('/ui-elements/loading-spinners') }}"> Loading Spinners </a>
                    </li>
                    <li class=" {{ active_class(['ui-element/paging']) }}">
                        <a href="{{ url('/ui-elements/paging') }}"> Pagination </a>
                    </li>
                    <li class=" {{ active_class(['ui-element/popovers']) }}">
                        <a href="{{ url('/ui-elements/popovers') }}"> Popovers </a>
                    </li>
                    <li class=" {{ active_class(['ui-element/progress-bar']) }}">
                        <a href="{{ url('/ui-elements/progress-bar') }}"> Progress Bar </a>
                    </li>
                    <li class=" {{ active_class(['ui-element/ribbons']) }}">
                        <a href="{{ url('/ui-elements/ribbons') }}"> Ribbons </a>
                    </li>
                    <li class=" {{ active_class(['ui-element/tooltips']) }}">
                        <a href="{{ url('/ui-elements/tooltips') }}"> Tooltips </a>
                    </li>
                    <li class=" {{ active_class(['ui-element/typography']) }}">
                        <a href="{{ url('/ui-elements/typography') }}"> Typography </a>
                    </li>
                    <li class=" {{ active_class(['ui-element/video']) }}">
                        <a href="{{ url('/ui-elements/video') }}"> Video </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="submenu" id="formsMenu">
            <div class="submenu-info">
                <div class="submenu-inner-info">
                    <h5 class="mb-3">Forms</h5>
                    <p>Et harum quidem rerum facilis et expedita.</p>
                </div>
                <ul class="submenu-list">
                    <li>
                        <a data-toggle="collapse" href="#formControls" role="button" aria-expanded="false"
                            aria-controls="collapseExample"
                            class="dropdown-toggle {{ active_class(['forms/controls/*']) }}">
                            Controls <i class="las la-angle-right sidemenu-right-icon"></i>
                        </a>
                        <ul class="sub-submenu-list collapse" id="formControls">
                            <li class=" {{ active_class(['forms/controls/base-inputs']) }}">
                                <a href="{{ url('/forms/controls/base-inputs') }}"> Base Input </a>
                            </li>
                            <li class=" {{ active_class(['forms/controls/input-groups']) }}">
                                <a href="{{ url('/forms/controls/input-groups') }}"> Input Groups </a>
                            </li>
                            <li class=" {{ active_class(['forms/controls/checkbox']) }}">
                                <a href="{{ url('/forms/controls/checkbox') }}"> Checkbox </a>
                            </li>
                            <li class=" {{ active_class(['forms/controls/radio']) }}">
                                <a href="{{ url('/forms/controls/radio') }}"> Radio </a>
                            </li>
                            <li class=" {{ active_class(['forms/controls/switch']) }}">
                                <a href="{{ url('/forms/controls/switch') }}"> Switch </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#formWidgets" role="button" aria-expanded="false"
                            aria-controls="collapseExample"
                            class="dropdown-toggle {{ active_class(['forms/widgets/*']) }}">
                            Widgets <i class="las la-angle-right sidemenu-right-icon"></i>
                        </a>
                        <ul class="sub-submenu-list collapse" id="formWidgets">
                            <li class=" {{ active_class(['forms/widgets/picker']) }}">
                                <a href="{{ url('/forms/widgets/picker') }}"> Picker </a>
                            </li>
                            <li class=" {{ active_class(['forms/widgets/tagify']) }}">
                                <a href="{{ url('/forms/widgets/tagify') }}"> Tagify </a>
                            </li>
                            <li class=" {{ active_class(['forms/widgets/touch-spin']) }}">
                                <a href="{{ url('/forms/widgets/touch-spin') }}"> Touch Spin </a>
                            </li>
                            <li class=" {{ active_class(['forms/widgets/max-length']) }}">
                                <a href="{{ url('/forms/widgets/max-length') }}"> Max Length </a>
                            </li>
                            <li class=" {{ active_class(['forms/widgets/switch']) }}">
                                <a href="{{ url('/forms/widgets/switch') }}"> Switch </a>
                            </li>
                            <li class=" {{ active_class(['forms/widgets/select-splitter']) }}">
                                <a href="{{ url('/forms/widgets/select-splitter') }}"> Select Splitter</a>
                            </li>
                            <li class=" {{ active_class(['forms/widgets/bootstrap-select']) }}">
                                <a href="{{ url('/forms/widgets/bootstrap-select') }}"> Bootstrap Select </a>
                            </li>
                            <li class=" {{ active_class(['forms/widgets/select2']) }}">
                                <a href="{{ url('/forms/widgets/select2') }}"> Select 2 </a>
                            </li>
                            <li class=" {{ active_class(['forms/widgets/input-masks']) }}">
                                <a href="{{ url('/forms/widgets/input-masks') }}"> Input Masks </a>
                            </li>
                            <li class=" {{ active_class(['forms/widgets/autogrow']) }}">
                                <a href="{{ url('/forms/widgets/autogrow') }}"> Autogrow </a>
                            </li>
                            <li class=" {{ active_class(['forms/widgets/range-slider']) }}">
                                <a href="{{ url('/forms/widgets/range-slider') }}"> Range Slider </a>
                            </li>
                            <li class=" {{ active_class(['forms/widgets/clipboard']) }}">
                                <a href="{{ url('/forms/widgets/clipboard') }}"> Clipboard </a>
                            </li>
                            <li class=" {{ active_class(['forms/widgets/typeahead']) }}">
                                <a href="{{ url('/forms/widgets/typeahead') }}"> Typeahead </a>
                            </li>
                            <li class=" {{ active_class(['forms/widgets/captcha']) }}">
                                <a href="{{ url('/forms/widgets/captcha') }}"> Captcha </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" {{ active_class(['forms/validation']) }}">
                        <a href="{{ url('/forms/validation') }}"> Validation </a>
                    </li>
                    <li class=" {{ active_class(['forms/layouts']) }}">
                        <a href="{{ url('/forms/layouts') }}"> Layouts </a>
                    </li>
                    <li class=" {{ active_class(['forms/text-editor']) }}">
                        <a href="{{ url('/forms/text-editor') }}"> Text Editor </a>
                    </li>
                    <li class=" {{ active_class(['forms/file-upload']) }}">
                        <a href="{{ url('/forms/file-upload') }}"> File Upload </a>
                    </li>
                    <li class=" {{ active_class(['forms/multiple-step']) }}">
                        <a href="{{ url('/forms/multiple-step') }}"> Multiple Step </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="submenu" id="mapsMenu">
            <div class="submenu-info">
                <div class="submenu-inner-info">
                    <h5 class="mb-3">Maps</h5>
                    <p>Excepteur sint occaecat cupidatat proident.</p>
                </div>
                <ul class="submenu-list">
                    <li class=" {{ active_class(['maps/leaflet-map']) }}">
                        <a href="{{ url('/maps/leaflet-map') }}"> Leaflet Map </a>
                    </li>
                    <li class=" {{ active_class(['maps/vector-map']) }}">
                        <a href="{{ url('/maps/vector-map') }}"> Vector Map </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="submenu" id="chartsMenu">
            <div class="submenu-info">
                <div class="submenu-inner-info">
                    <h5 class="mb-3">Charts</h5>
                    <p>Nemo enim ipsam voluptatem quia voluptas.</p>
                </div>
                <ul class="submenu-list">
                    <li class=" {{ active_class(['charts/apex-chart']) }}">
                        <a href="{{ url('/charts/apex-chart') }}"> Apex Chart </a>
                    </li>
                    <li class=" {{ active_class(['charts/chartlist-chart']) }}">
                        <a href="{{ url('/charts/chartlist-chart') }}"> Chartlist Charts </a>
                    </li>
                    <li class=" {{ active_class(['charts/chartjs']) }}">
                        <a href="{{ url('/charts/chartjs') }}"> ChartJS </a>
                    </li>
                    <li class=" {{ active_class(['charts/morris-chart']) }}">
                        <a href="{{ url('/charts/morris-chart') }}"> Morris Charts </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="submenu" id="starterKitMenu">
            <div class="submenu-info">
                <div class="submenu-inner-info">
                    <h5 class="mb-3">Starter Kit</h5>
                    <p>Adipisci velit, sed quia non numquam eius.</p>
                </div>
                <ul class="submenu-list">
                    <li class=" {{ active_class(['starter/blank-page']) }}">
                        <a href="{{ url('/starter/blank-page') }}"> Blank Page </a>
                    </li>
                    <li class=" {{ active_class(['starter/breadcrumbs']) }}">
                        <a href="{{ url('/starter/breadcrumbs') }}"> Breadcrumbs </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="submenu" id="multiLevelMenu">
            <div class="submenu-info">
                <div class="submenu-inner-info">
                    <h5 class="mb-3">Multi Level</h5>
                    <p>Quis autem vel eum iure reprehenderit qui.</p>
                </div>
                <ul class="submenu-list">
                    <li>
                        <a data-toggle="collapse" href="#multiLevelLevelTwo" role="button" aria-expanded="false"
                            aria-controls="collapseExample" class="dropdown-toggle"> Level 2 <i
                                class="las la-angle-right sidemenu-right-icon"></i> </a>
                        <ul class="collapse sub-submenu-list" id="multiLevelLevelTwo">
                            <li>
                                <a href="javascript:void(0)"> Link 1 </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"> Link 2 </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#multiLevelLevelThree" role="button" aria-expanded="false"
                            aria-controls="collapseExample" class="dropdown-toggle"> Level 3 <i
                                class="las la-angle-right sidemenu-right-icon"></i> </a>
                        <ul class="collapse sub-submenu-list" id="multiLevelLevelThree">
                            <li>
                                <a href="javascript:void(0)"> Link 1</a>
                            </li>
                            <li>
                                <a data-toggle="collapse" href="#multiLevelLevelThreeOne" role="button"
                                    aria-expanded="false" aria-controls="collapseExample" class="dropdown-toggle"> Link
                                    2 <i class="las la-angle-right sidemenu-right-icon"></i> </a>
                                <ul class="collapse list-unstyled sub-sub-submenu-list" id="multiLevelLevelThreeOne">
                                    <li>
                                        <a href="javascript:void(0)"> Link 1</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"> Link 2 </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
