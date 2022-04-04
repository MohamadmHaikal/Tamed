@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/dropify/dropify.min.css') !!}
    {!! Html::style('assets/css/pages/profile_edit.css') !!}
@endpush

@section('content')
    <?php
    $user = get_current_user_data();
    
    ?>
    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ __('backend.My Account') }}</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="account-settings-container layout-top-spacing">
            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div id="general-info" class="section general-info">
                                <div class="info">
                                    <div class="d-flex mt-2">
                                        <div class="profile-edit-left">
                                            <div class="tab-options-list">
                                                <div class="nav flex-column nav-pills mb-sm-0 mb-3   text-center mx-auto"
                                                    id="v-border-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <a class="nav-link active" id="v-border-pills-general-tab"
                                                        data-toggle="pill" href="#v-border-pills-general" role="tab"
                                                        aria-controls="v-border-pills-general" aria-selected="true"><i
                                                            class="las la-info"></i>
                                                        {{ __('backend.General Information') }}</a>
                                                    <a class="nav-link  text-center" id="v-border-pills-about-tab"
                                                        data-toggle="pill" href="#v-border-pills-about" role="tab"
                                                        aria-controls="v-border-pills-about" aria-selected="false"><i
                                                            class="lar la-user"></i> {{ __('backend.About') }}</a>
        
                                                    <a class="nav-link  text-center" id="v-border-pills-contact-tab"
                                                        data-toggle="pill" href="#v-border-pills-contact" role="tab"
                                                        aria-controls="v-border-pills-contact" aria-selected="false"><i
                                                            class="las la-phone"></i> {{ __('backend.Contact') }}</a>
                                                    <a class="nav-link  text-center" id="v-border-pills-work-tab"
                                                        data-toggle="pill" href="#v-border-pills-work" role="tab"
                                                        aria-controls="v-border-pills-work" aria-selected="false"><i
                                                            class="las la-suitcase"></i> {{ __('backend.projects') }}</a>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <button id="updateProfile" class="btn btn-success "
                                                    style="width: 75%">{{ __('backend.save') }}</button>
                                            </div>
                                        </div>
                                        <div class="profile-edit-right">
                                            <div class="tab-content" id="v-border-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-border-pills-general"
                                                    role="tabpanel" aria-labelledby="v-border-pills-general-tab">


                                                    <div class=" text-center img-thumbnail">
                                                        <input type="file" id="UploadLogo" class="dropify"
                                                            data-default-file="{{ url("image/$user->logo") }}"
                                                            data-max-file-size="2M"  name="logo"/>
                                                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                            {{ __('backend.Upload Picture') }}</p>
                                                    </div>

                                                    <div class=" mt-10 md-0 mt-4">
                                                        <div class="form">

                                                            <div class="form-group">
                                                                <label for="fullName">{{ __('backend.name') }}</label>
                                                                <input type="text" class="form-control mb-4 "
                                                                    placeholder="{{ __('backend.name') }}"
                                                                    name="name"
                                                                    value="{{ $user->name }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="country">{{ __('backend.facility type') }}</label>
                                                            <select class="form-control"  name="facility_type">
                                                                <option selected >{{ __('شركة مقاولات') }}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="country">{{ __('backend.facility activity') }}</label>
                                                            <select class="form-control"  name="facility_activity">
                                                              
                                                                <option selected >{{ __('تشيد وبناء') }}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane fade" id="v-border-pills-about" role="tabpanel"
                                                    aria-labelledby="v-border-pills-about-tab">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="aboutBio">{{ __('backend.About') }}</label>
                                                                <textarea class="form-control" name="description" placeholder="{{ __('backend.Tell something interesting about yourself') }}"
                                                                    rows="10">{{ $user->description }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="tab-pane fade" id="v-border-pills-contact" role="tabpanel"
                                                    aria-labelledby="v-border-pills-contact-tab">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="country">{{ __('backend.City') }}</label>
                                                                        <select class="form-control"  name="City">
                                                                           
                                                                            <option selected >{{ __('الرياض') }}
                                                                            </option>
                                                                            <option>{{ __('جدة') }}</option>
                                                                            <option>{{ __('المدينة المنورة') }}</option>
                                                                            <option>{{ __('جدة') }}</option>
                                                                            <option>{{ __('ابها') }}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="country">{{ __('backend.Neighborhood') }}</label>
                                                                        <select class="form-control"  name="Neighborhood">
                                                                           
                                                                            <option selected>{{ __('غرناطة') }}
                                                                            </option>
                                                                            <option>{{ __('اليرموك') }}</option>
                                                                            <option>{{ __('الدرعية') }}</option>
                                                        
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                              
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="phone">{{ __('backend.phone') }}</label>
                                                                        <input type="text"  name="phone" class="form-control mb-4"
                                                                            placeholder="{{ __('Write your phone number here') }}"
                                                                            value="{{$user->phone}}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="email">{{ __('backend.email') }}</label>
                                                                        <input type="text" class="form-control mb-4"
                                                                        name="email"
                                                                            placeholder="{{ __('Write your email here') }}"
                                                                            value="{{ $user->email }}">
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="v-border-pills-social" role="tabpanel"
                                                    aria-labelledby="v-border-pills-social-tab">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-10 mb-3">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="country">{{ __('Select Social Media') }}</label>
                                                                        <select class="form-control">
                                                                            <option>{{ __('Github') }}</option>
                                                                            <option>{{ __('Slack') }}</option>
                                                                            <option>{{ __('Snapchat') }}</option>
                                                                            <option>{{ __('Outlook') }}</option>
                                                                            <option>{{ __('Google') }}</option>
                                                                            <option>{{ __('Wordpress') }}</option>
                                                                            <option>{{ __('Gitlab') }}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 pt-1 mb-3">
                                                                    <button
                                                                        class="btn btn-primary">{{ __('Add') }}</button>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="input-group social-linkedin mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text bg-linkedin">
                                                                                <i
                                                                                    class="lab la-linkedin-in font-30 text-white"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text" class="form-control border-0"
                                                                            placeholder="{{ __('linkedin Username') }}"
                                                                            aria-label="{{ __('Username') }}"
                                                                            aria-describedby="linkedin"
                                                                            value="{{ __('sara.williams') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="input-group social-tweet mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text bg-info">
                                                                                <i
                                                                                    class="lab la-twitter font-30 text-white"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text" class="form-control border-0"
                                                                            placeholder="{{ __('Hi') }}Twitter Username"
                                                                            aria-label="{{ __('Hi') }}Username"
                                                                            aria-describedby="tweet"
                                                                            value="{{ __('@swilliams') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="input-group social-insta mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text bg-danger">
                                                                                <i
                                                                                    class="lab la-instagram font-30 text-white"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text" class="form-control border-0"
                                                                            placeholder="Github Username"
                                                                            aria-label="{{ __('Username') }}"
                                                                            aria-describedby="github"
                                                                            value="{{ __('@sara.williams') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="input-group social-fb mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text bg-facebook">
                                                                                <i
                                                                                    class="lab la-facebook-f font-30 text-white"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text" class="form-control border-0"
                                                                            placeholder="{{ __('Facebook Username') }}"
                                                                            aria-label="{{ __('Username') }}"
                                                                            aria-describedby="fb"
                                                                            value="{{ __('sara.williams') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="input-group social-skype mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text bg-info">
                                                                                <i
                                                                                    class="lab la-skype font-30 text-white"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text" class="form-control border-0"
                                                                            placeholder="{{ __('Github Username') }}"
                                                                            aria-label="{{ __('Username') }}"
                                                                            aria-describedby="github"
                                                                            value="{{ __('@sara_williams') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="input-group social-apple mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text bg-dark">
                                                                                <i
                                                                                    class="lab la-apple font-30 text-white"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text" class="form-control border-0"
                                                                            placeholder="{{ __('Github Username') }}"
                                                                            aria-label="{{ __('Username') }}"
                                                                            aria-describedby="github"
                                                                            value="{{ __('Hi') }}@sara.williams">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="tab-pane fade" id="v-border-pills-work" role="tabpanel"
                                                    aria-labelledby="v-border-pills-work-tab">
                                                    <div class="row">
                                                        <div class="col-md-12 text-right mb-2">
                                                            <button class="btn btn-primary">{{ __('Add') }}</button>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="work-section">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="degree2">{{ __('Company Name') }}</label>
                                                                            <input type="text" class="form-control mb-4"
                                                                                placeholder="{{ __('Add your work here') }}"
                                                                                value="{{ __('Amazon') }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="degree3">{{ __('Company Name') }}</label>
                                                                                    <input type="text"
                                                                                        class="form-control mb-4"
                                                                                        placeholder="{{ __('Job Title') }}"
                                                                                        value="{{ __('Data Analyst') }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="degree4"></label>
                                                                                    <input type="text"
                                                                                        class="form-control mb-4"
                                                                                        placeholder="{{ __('Location') }}"
                                                                                        value="{{ __('Geneva') }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>{{ __('Starting From') }}</label>
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <select
                                                                                                class="form-control mb-4">
                                                                                                <option>
                                                                                                    {{ __('Month') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Jan') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Feb') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Mar') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Apr') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('May') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Jun') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Jul') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Aug') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Sep') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Oct') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Nov') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Dec') }}
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <select
                                                                                                class="form-control mb-4">
                                                                                                <option>
                                                                                                    {{ __('Year') }}
                                                                                                </option>
                                                                                                <option>2020</option>
                                                                                                <option>2019</option>
                                                                                                <option>2018</option>
                                                                                                <option>2017</option>
                                                                                                <option>2016</option>
                                                                                                <option>2015</option>
                                                                                                <option>2014</option>
                                                                                                <option>2013</option>
                                                                                                <option>2012</option>
                                                                                                <option>2011</option>
                                                                                                <option>2010</option>
                                                                                                <option>2009</option>
                                                                                                <option>2008</option>
                                                                                                <option>2007</option>
                                                                                                <option>2006</option>
                                                                                                <option>2005</option>
                                                                                                <option>2004</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>{{ __('Ending In') }}</label>
                                                                                    <div class="row">
                                                                                        <div class="col-md-6 mb-4">
                                                                                            <select class="form-control">
                                                                                                <option>
                                                                                                    {{ __('Month') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Jan') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Feb') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Mar') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Apr') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('May') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Jun') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Jul') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Aug') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Sep') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Oct') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Nov') }}
                                                                                                </option>
                                                                                                <option>
                                                                                                    {{ __('Dec') }}
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <select
                                                                                                class="form-control input-sm">
                                                                                                <option>
                                                                                                    {{ __('Year') }}
                                                                                                </option>
                                                                                                <option>2020</option>
                                                                                                <option>2019</option>
                                                                                                <option>2018</option>
                                                                                                <option>2017</option>
                                                                                                <option>2016</option>
                                                                                                <option>2015</option>
                                                                                                <option>2014</option>
                                                                                                <option>2013</option>
                                                                                                <option>2012</option>
                                                                                                <option>2011</option>
                                                                                                <option>2010</option>
                                                                                                <option>2009</option>
                                                                                                <option>2008</option>
                                                                                                <option>2007</option>
                                                                                                <option>2006</option>
                                                                                                <option>2005</option>
                                                                                                <option>2004</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/dropify/dropify.min.js') !!}
    {!! Html::script('assets/js/pages/profile_edit.js') !!}
@endpush

@push('custom-scripts')
@endpush
