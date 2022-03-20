@extends('layout.master-auth')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('assets/css/authentication/auth_2.css') !!}
@endpush

@section('content')
    <!-- Main Body Starts -->
    <div class="login-two">
        <div class="container-fluid login-two-container">
            <div class="row main-login-two">
                <div class="col-md-12 p-0 ">
                    <div class="login-bg">
                        <div class="center-two-start">
                            <h6 class="right-bar-heading px-3 mt-2 text-dark text-center font-30 text-uppercase">
                                {{ __('backend.login') }}</h6>
                            <form>
                                <div class="form-1">
                                    <p class="text-center text-muted mt-3 mb-3 font-14">
                                        {{ __('backend.Enter your mobile number to create an account or login') }}
                                    </p>
                                    
                                    <div class="login-two-inputs mt-5">
                                        <input type="text" placeholder="5678 234 51" name="mobile" id="mobile"  />
                                        <div class="row">
                                            <img src="{{ asset('assets/img/saudia.png') }}">
                                            <small>966+</small>

                                        </div>
                                    </div>
                                    <div class="login-two-inputs mt-5 text-center d-flex">
                                        <button class="ripple-button ripple-button-primary w-100 btn-login ml-3 mr-3"
                                            type="button" id="getCodeButton">
                                            <div class="ripple-ripple js-ripple">
                                                <span class="ripple-ripple__circle"></span>
                                            </div>
                                            {{ __('backend.Entry') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="form-2">
                                <p class="text-center text-muted mt-3 mb-3 font-14" id="codeNote">
                                    {{ __('backend.We have sent a message to') }}</p>
                                   <h6>{{__('backend.Please enter the code to continue')}}</h6> 
                                    <input type="text" id='phone' hidden>
                                <form method="get" class="digit-group mt-3" data-group-name="digits" data-autosubmit="false"
                                    autocomplete="off">
                                    
                                    <input type="text" id="digit-1" name="digit-1" data-previous="digit-2" />
                                    <input type="text" id="digit-2" name="digit-2" data-next="digit-1" data-previous="digit-3"/>
                                    <input type="text" id="digit-3" name="digit-3" data-next="digit-2" data-previous="digit-4"/>
                                    <input type="text" id="digit-4" name="digit-4" data-next="digit-3" />
                                </form>

                                <div class="login-two-inputs text-center mt-4">
                                    <button class="ripple-button ripple-button-primary btn-lg btn-login" type="button" id="CodeSubmit">
                                        <div class="ripple-ripple js-ripple">
                                            <span class="ripple-ripple__circle"></span>
                                        </div>
                                        {{ __('backend.verification') }}
                                    </button>
                                </div>
                                <div class="login-two-inputs mt-3 text-center font-12 strong">
                                    <a href="javascript:void(0)" class="text-primary"
                                        id="changeEmailAddress">{{ __('backend.Change your phone number') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="alert">

    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('assets/js/libs/jquery-3.6.0.min.js') !!}
    {!! Html::script('plugins/bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/authentication/auth_2.js') !!}
@endpush

@push('custom-scripts')
@endpush
