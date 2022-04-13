@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/dropify/dropify.min.css') !!}
    {!! Html::style('assets/css/pages/profile_edit.css') !!}
    {!! Html::style('assets/css/forms/form-widgets.css') !!}
    {!! Html::style('assets/css/forms/file-upload.css') !!}
    {!! Html::style('plugins/flatpickr/flatpickr.css') !!}
    {!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
@endpush

@section('content')
    <?php
    $user = get_current_user_data();
    $projects = get_current_user_projects();
    $cities = get_cities();
    $userType=get_users_type();
    $curentType=get_facility_type($user->activitie_id);
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
                                                    <a class="nav-link  text-center" id="v-border-pills-profile-tab"
                                                        data-toggle="pill" href="#v-border-pills-profile" role="tab"
                                                        aria-controls="v-border-pills-profile" aria-selected="false"><i
                                                            class="las la-file"></i> {{ __('backend.profile') }}</a>
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
                                                            data-max-file-size="2M" name="logo" />
                                                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i>
                                                            {{ __('backend.Upload Picture') }}</p>
                                                    </div>

                                                    <div class=" mt-10 md-0 mt-4">
                                                        <div class="form">

                                                            <div class="form-group">
                                                                <label for="fullName">{{ __('backend.name') }}</label>
                                                                <input type="text" class="form-control mb-4 "
                                                                    placeholder="{{ __('backend.name') }}" name="name"
                                                                    value="{{ $user->name }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label
                                                                    for="country">{{ __('backend.facility type') }}</label>
                                                                <select class="form-control" name="facility_type" id="facility_type"  data-now="{{ $curentType->id }}"
                                                                    data-current="{{ $user->activitie_id }}">
                                                                    @foreach ($userType as $type )
                                                                    @if ($curentType->id==$type->id)
                                                                    <option value="{{$type->id}}" selected>{{ $type->name }}
                                                                    </option>
                                                                    @else
                                                                     <option value="{{$type->id}}">{{ $type->name }}
                                                                    </option>
                                                                    @endif
                                                                   
                                                                    @endforeach
                                                                  
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label
                                                                    for="country">{{ __('backend.facility activity') }}</label>
                                                                <select class="form-control" name="facility_activity" id="facility_activity">

                                                                   
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row col-md-12">
                                                            <?php
                                                                $i=0
                                                                
                                                                ?>
                                                                <div class="form-group" style="padding-right: inherit;" id="subActivity">
                                                                    {{-- @for ($i=0; $i<30;$i++)
                                                                        
                                                                   
                                                                    <!-- Visible button -->
                                                                    <input onclick="toogleButton(this,'hiddenButton')"
                                                                        class="btn btn-outline-primary btn-rounded mb-2" type="button" value="ttt">
                                                                    <!-- Hidden input -->
                                                                    <input name="FM_city" id="hiddenButton" type="hidden"
                                                                        value="0">
                                                                        @endfor --}}
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
                                                                        <label
                                                                            for="country">{{ __('backend.City') }}</label>
                                                                        <select class="form-control" name="city" id="city"
                                                                            data-now="{{ $user->city_id }}"
                                                                            data-current="{{ $user->neighbor_id }}">
                                                                            @foreach ($cities as $city)
                                                                                @if ($user->city_id == $city->id)
                                                                                    <option value="{{ $city->id }}"
                                                                                        selected>{{ $city->name }}
                                                                                    </option>
                                                                                @else
                                                                                    <option value="{{ $city->id }}">
                                                                                        {{ $city->name }}
                                                                                    </option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="country">{{ __('backend.Neighborhood') }}</label>
                                                                        <select class="form-control" name="Neighborhood"
                                                                            id="Neighborhood">



                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="phone">{{ __('backend.phone') }}</label>
                                                                        <input type="text" name="phone"
                                                                            class="form-control mb-4"
                                                                            placeholder="{{ __('Write your phone number here') }}"
                                                                            value="{{ $user->phone }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="email">{{ __('backend.email') }}</label>
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
                                                <div class="tab-pane fade" id="v-border-pills-work1" role="tabpanel"
                                                    aria-labelledby="v-border-pills-work1-tab1">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="work-section">

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="degree2">{{ __('backend.name') }}</label>
                                                                            <input type="text" name="project_name"
                                                                                class="form-control mb-4"
                                                                                placeholder="{{ __('backend.name') }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="degree2">{{ __('backend.description') }}</label>
                                                                            <textarea type="text" class="form-control mb-4" rows="10" name="project_description"
                                                                                placeholder="{{ __('backend.description') }}"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="fieldlabels">{{ __('backend.Starting From') }}</label>
                                                                                    <input id="basicExample"
                                                                                        name="start_date"
                                                                                        class="form-control flatpickr flatpickr-input active basicExample"
                                                                                        type="text"
                                                                                        placeholder="{{ __('Select Date') }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">

                                                                                    <label
                                                                                        class="fieldlabels">{{ __('backend.Ending In') }}</label>
                                                                                    <input id="basicExample" name="end_date"
                                                                                        class="form-control flatpickr flatpickr-input active basicExample"
                                                                                        type="text"
                                                                                        placeholder="{{ __('Select Date') }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">

                                                                        <div class="form-group">
                                                                            <label>{{ __('backend.project photos') }}</label>
                                                                            {{-- <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                        <div class="attached-files">
                                                                                            <img id="image-preview" width="320">
                                                                                        </div>
                                                                                        <label for="file-upload" class="custom-file-upload mb-0">
                                                                                            <a title="Attach a file" class="mr-2 pointer text-primary">
                                                                                                <i class="las la-paperclip font-20"></i>
                                                                                                <span class="font-17">{{__('Forms')}}Click here to attach an image</span>
                                                                                            </a>
                                                                                        </label>
                                                                                        <input id="file-upload" name='upload_cont_img[]' type="file" accept="image/*" style="display:none;" onchange="handleFileChange()" multiple>
                                                                                    </div> --}}

                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <button class="btn btn-success" type="submit"
                                                                    id="AddProject"
                                                                    style="margin-right: 80%;">{{ __('backend.add') }}</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="v-border-pills-profile" role="tabpanel"
                                                    aria-labelledby="v-border-pills-profile-tab">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="work-section text-center">
                                                                <label for="profile" class="custom-file-upload mb-0">
                                                                    <a title="Attach a file"
                                                                        class="mr-2 pointer text-primary btn btn-outline-primary">
                                                                        <i class="las la-paperclip font-20"></i>
                                                                        <span
                                                                            class="font-17">{{ __('backend.profile upload') }}</span>
                                                                    </a>
                                                                </label>
                                                                <input id="profile" name='upload_3D_files' type="file"
                                                                    accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf"
                                                                    style="display:none;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="v-border-pills-work" role="tabpanel"
                                                    aria-labelledby="v-border-pills-work-tab">
                                                    <div class="row">
                                                        <div class="col-md-12 text-right mb-2">
                                                            <button class="btn btn-primary" id="v-border-pills-work1-tab1"
                                                                data-toggle="pill" href="#v-border-pills-work1" role="tab"
                                                                aria-controls="v-border-pills-work1"
                                                                aria-selected="false">{{ __('backend.Add Project') }}</button>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="table-responsive mb-4">

                                                                <table id="export-dt" class="table table-hover"
                                                                    style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>{{ __('backend.id') }}</th>
                                                                            <th>{{ __('backend.project name') }}</th>
                                                                            <th>{{ __('backend.Starting From') }}</th>
                                                                            <th>{{ __('backend.Ending In') }}</th>
                                                                            <th class="no-content"></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($projects as $project)
                                                                            <tr>
                                                                                <td>{{ $project->id }}</td>
                                                                                <td>{{ $project->name }}</td>
                                                                                <td>{{ $project->start_date }}</td>
                                                                                <td>{{ $project->end_date }}</td>
                                                                                <td class="text-center">
                                                                                    <div class="dropdown custom-dropdown">
                                                                                        <a class="dropdown-toggle font-20 text-primary"
                                                                                            href="#" role="button"
                                                                                            data-toggle="dropdown"
                                                                                            aria-haspopup="true"
                                                                                            aria-expanded="false">
                                                                                            <i class="las la-cog"></i>
                                                                                        </a>
                                                                                        <div class="dropdown-menu"
                                                                                            aria-labelledby="dropdownMenuLink1"
                                                                                            style="will-change: transform;">
                                                                                            <a class="dropdown-item show-item"
                                                                                                data-id="{{ $project->id }}"
                                                                                                href="javascript:void(0);">{{ __('backend.Show') }}</a>
                                                                                            <a class="dropdown-item edit-item"
                                                                                                href="javascript:void(0);"
                                                                                                data-id="{{ $project->id }}">{{ __('backend.Edit') }}</a>

                                                                                            <a class="dropdown-item "
                                                                                                href="{{ route('delete-your-project', [$project->id]) }}"
                                                                                                style="color: red">{{ __('backend.Delete') }}</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
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
    {!! Html::script('plugins/flatpickr/flatpickr.js') !!}
    {!! Html::script('plugins/flatpickr/custom-flatpickr.js') !!}
@endpush

@push('custom-scripts')
    <script>
      
    </script>
@endpush
