@extends('layout.master')

@push('plugin-styles')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
{!! Html::style('assets/css/forms/form-widgets.css') !!}
{!! Html::style('assets/css/forms/multiple-step.css') !!}

{!! Html::style('plugins/flatpickr/flatpickr.css') !!}
{!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
{!! Html::style('assets/css/forms/switch-theme.css') !!}
{!! Html::style('assets/css/forms/radio-theme.css') !!}
{!! Html::style('assets/css/forms/jquery.dropdown.css') !!}


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="{{asset('editor.css')}}" type="text/css" rel="stylesheet" />

@endpush

@section('content')
<!--  Navbar Starts / Breadcrumb Area  -->

@php
$item = isset($item) ? $item: null;

@endphp
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('backend.Add Ads')}}</a></li>
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
    <div class="layout-top-spacing mb-2">
        <div class="col-md-12">
            <div class="row">
                <div class="container p-0">
                    <div class="row layout-top-spacing">

                        <div class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>{{__('Forms')}}Step Type 1</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="card multiple-form-one px-0 pb-0 mb-3">
                                                <h5 class="text-center"><strong>{{__('backend.Add Ads')}}</strong></h5>

                                                <div class="row">
                                                    <div class="col-md-12 mx-0">
                                                        <form id="msform" method={{ isset($item) ? 'PUT' : 'POST' }}
                                                            action="{{ isset($item) ? route('ads.update', $item->id) :  route('ads.store')  }}"
                                                            enctype="multipart/form-data">
                                                            <input type="hidden" name="user_id" placeholder=""
                                                                value="{{ get_current_user_id()}}"
                                                                class="form-control mb-3" />

                                                            <ul id="progressbar">
                                                                <li class="active" id="account">
                                                                    <strong>{{__('backend.section')}}</strong></li>
                                                                <li id="personal">
                                                                    <strong>{{__('backend.informaton')}}</strong></li>
                                                                <li id="payment">
                                                                    <strong>{{__('backend.files')}}</strong></li>
                                                                <li id="confirm">
                                                                    <strong>{{__('backend.Finish')}}</strong></li>
                                                            </ul>
                                                            <fieldset>
                                                                <div class="form-card">
                                                                    <h5 class="fs-title mb-4">
                                                                        {{__('backend.select section')}}</h5>
                                                                    @php
                                                                    $ArrayType = getArrayType();
                                                                    @endphp
                                                                    <div class="form-group x row">
                                                                        @foreach ($ArrayType as $Type)
                                                                        <div class="col-md-3 mb-3">
                                                                            <span class="TypeProject type sec "
                                                                                id="animateArea"
                                                                                value="{{ $Type->id }}"
                                                                                {{ isset($item) && $item->type == $Type->name ? 'selected' :'' }}>
                                                                                <img src="{{ asset('image/'.$Type->image) }}"
                                                                                class="sectionImage">

                                                                                <p id="LabelTypeProject">
                                                                                    {{__('backend.'.$Type->name)}}
                                                                                </p>

                                                                            </span>
                                                                        </div>

                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                                <input type="button" name="next"
                                                                    class="next action-button btn btn-primary"
                                                                    value="{{__('Forms')}}Next Step" />
                                                            </fieldset>
                                                            <fieldset>
                                                                <div class="form-card">
                                                                    <div id="inputsAds"></div>
                                                                    <div class="row mt-6">
                                                                        <div class="col-12">
                                                                            <label
                                                                                class="fieldlabels">{{__('backend.title')}}</label>
                                                                            <input type="text" name="title"
                                                                                placeholder="" data-error="#title"
                                                                                value="{{ isset($item) ? $item->title : '' }}"
                                                                                class="form-control mb-3" />
                                                                        </div>
                                                                        <div class="errorTxt col-md-6">
                                                                            <span class="spanError" id="title"></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-6">
                                                                        <div class="col-12">
                                                                            <label
                                                                                class="fieldlabels">{{__('backend.description')}}</label>
                                                                            <div class="container-fluid">
                                                                                <div class="row">
                                                                                    <div class="container">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-lg-12 nopadding">
                                                                                                <textarea
                                                                                                data-error="#Errordescription"
                                                                                                    id="demo-editor-bootstrap"
                                                                                                    name="description"
                                                                                                    dir="rtl">{{ isset($item) ? $item->description : '' }} </textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="errorTxt col-md-6">
                                                                            <span class="spanError" id="Errordescription"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row row mt-3">
                                                                        <div class="col-md-6">
                                                                            <label
                                                                                class="fieldlabels">{{__('backend.city')}}</label>
                                                                            <input type="text" name="city"
                                                                            data-error="#city"
                                                                                placeholder=""
                                                                                value="{{ isset($item) ? $item->city : '' }}"
                                                                                class="form-control mb-3" />
                                                                                <div class="errorTxt col-md-6">
                                                                                    <span class="spanError" id="city"></span>
                                                                                </div>
                                                                        </div>
                                                                       
                                                                        <div class="col-md-6">
                                                                            <label
                                                                                class="fieldlabels">{{__('backend.neighborhood')}}</label>
                                                                            <input type="text" name="neighborhood"
                                                                            data-error="#neighborhood"
                                                                                placeholder=""
                                                                                value="{{ isset($item) ? $item->neighborhood : '' }}"
                                                                                class="form-control mb-3" />
                                                                                <div class="errorTxt col-md-6">
                                                                                    <span class="spanError" id="neighborhood"></span>
                                                                                </div>
                                                                        </div>
                                                                    </div>

                                                                    {{-- <label class="fieldlabels">{{__('backend.startdate')}}</label>
                                                                    <input id="basicExample" name="startdate"
                                                                        value="{{ isset($item) ? $item->startdate : '' }}"
                                                                        class="form-control flatpickr flatpickr-input active basicExample"
                                                                        type="text"
                                                                        placeholder="{{__('backend.Select Date')}}">
                                                                    --}}

                                                                    <div class="row mt-6">
                                                                        <div class="col-4">
                                                                            <input type="hidden" name="type" id="type"  value="{{ isset($item) ? $item->type : '' }}">
                                                                            <label
                                                                                class="fieldlabels">{{__('backend.Last date for receiving bids')}}</label>
                                                                            <input id="basicExample" name="deadline"
                                                                                value="{{ isset($item) ? $item->deadline : '' }}"
                                                                                class="form-control flatpickr flatpickr-input active basicExample"
                                                                                type="text"
                                                                                placeholder="{{__('backend.Select Date')}}">
                                                                        </div>

                                                                        <div class="col-2"></div>


                                                                        <div class="col-6">
                                                                            {{-- <label class="fieldlabels">{{__('backend.Price')}}</label>
                                                                            --}}
                                                                            <div class="input-group mt-3">

                                                                                <div style="align-self: center;"
                                                                                    class="input-group-prepend col-md-4 switch-outer-container">
                                                                                    <label class="bestPrice">
                                                                                        {{__('backend.best price')}}</label>

                                                                                    <span
                                                                                        class="switch switch-outline switch-icon switch-primary">
                                                                                        <label>

                                                                                            <input type="checkbox"
                                                                                                id="bestPrice"
                                                                                                value="{{ isset($item) ? $item->bestPrice : 'on' }}"
                                                                                                checked="checked"
                                                                                                name="pricestatus">

                                                                                            <span></span>
                                                                                        </label>
                                                                                    </span>
                                                                                </div>

                                                                                <div class="input-group-prepend col-md-8"
                                                                                    id="price" hidden>
                                                                                    <label
                                                                                        class="fieldlabels">{{__('backend.total value to project')}}</label>

                                                                                    <input type="text" name="price"
                                                                                        value="{{ isset($item) ? $item->price : '' }}"
                                                                                        placeholder="{{__('backend.Price')}}"
                                                                                        class="form-control" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="errorTxt">
                                                                        <span id="errNm2"></span>
                                                                    </div>
                                                                </div>
                                                                <input type="button" name="previous"
                                                                    class="previous action-button-previous btn btn-outline-primary"
                                                                    value="{{__('Forms')}}Previous" />
                                                                <input type="button" name="next"
                                                                    class="next action-button btn btn-primary"
                                                                    value="{{__('Forms')}}Next Step" />
                                                            </fieldset>
                                                            <fieldset>
                                                                <div class="form-card">
                                                                    @if ( isset($item))
                                                                    @include('addItem.Ads.editFile')
                                                                    @else
                                                                    @include('addItem.Ads.createFile')
                                                                    @endif
                                                                </div>
                                                                <input type="button" name="previous"
                                                                    class="previous action-button-previous btn btn-outline-primary"
                                                                    value="{{__('Forms')}}Previous" />
                                                                <input type="button" name="make_payment"
                                                                    class=" action-button btn btn-primary"
                                                                    value="{{__('Forms')}}Confirm" id="createItem"/>
                                                            </fieldset>
                                                            <fieldset>
                                                                <div class="form-card">
                                                                    <h5 class="fs-title mb-4 text-center">
                                                                        {{__('Forms')}}Congrats !</h5><br>
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-md-3">
                                                                            <svg class="checkmark"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 52 52">
                                                                                <circle class="checkmark__circle"
                                                                                    cx="26" cy="26" r="25"
                                                                                    fill="none" />
                                                                                <path class="checkmark__check"
                                                                                    fill="none"
                                                                                    d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                                                                </svg>
                                                                        </div>
                                                                    </div> <br><br>
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-md-7 text-center">
                                                                            <p>{{__('Forms')}}You Have Successfully
                                                                                Signed Up</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </form>
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
{!! Html::script('assets/js/forms/multiple-step.js') !!}
{!! Html::script('plugins/flatpickr/flatpickr.js') !!}
{!! Html::script('plugins/flatpickr/custom-flatpickr.js') !!}
{!! Html::script('assets/js/jquery.dropdown.js') !!}
{!! Html::script('assets/js/mock.js') !!}
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="{{asset('editor.js')}}"></script>
<script>
    $(document).ready(function () {
        $("#demo-editor-bootstrap").Editor();
    });
</script>
@endpush

@push('custom-scripts')

<script>
    $(document).ready(function () {
        var url = window.location.pathname;
        var stuff = url.split('/');
        if (stuff[stuff.length - 1] == 'edit') {
            var id = stuff[stuff.length - 2];
            type($('#type').val(), id)
        }

    });

    function type(type, id = '') {
        $('#inputsAds').empty();
        $('#type').empty();
       
        var url = "{{ URL::to('ads/getType') }}/" + type + '/' + id;
        $.ajax({
            url: url,
            type: "get",
            contentType: 'application/json',
            success: function (data) {
                $('#inputsAds').append(data);
                $('#type').val(type);
            },
            error: function (xhr) {}
        });
    }

    $('.type').on('click', function () {
        var id = $(this).attr('value');
        type(id)
    });

    $("#bestPrice").change(function () {
        if ($(this).prop("checked") == true) {
            $("[name='price']").val('');
            $("#price").prop('hidden', true);
        } else {
            $("#price").prop('hidden', false);
        }
    });

    $(document).on('change', '#mainActivity', function () {
        $('#AddActivity').empty();
        var url = "{{ URL::to('ads/getAddActivity') }}/" + $(this).val();
        $.ajax({
            url: url,
            type: "get",
            contentType: 'application/json',
            success: function (data) {

                $('#AddActivity').append("   <option  ></option>");
                        
                $.each(data, function (key, value) {

                    $('#AddActivity').append("<option value=" +
                        value.id + ">" + value.name + "</option>");
                })
                // $('#AddActivity').append(data);
            },
            error: function (xhr) {}
        });
    });


    $('#createItem').on('click', function () {
        var fd = new FormData();
        $.each($(".file-upload"), function (key, value) {
            var files = value.files;
            for (var i = 0; i < files.length; i++) {
                fd.append(value.name, $(".file-upload").get(0).files[i]);
            }
        });
        let form = $(this).closest("form").serializeArray();
       
        $.each(form, function (key, input) {
            if (input.name === 'description') {
                editor = $("#demo-editor-bootstrap").Editor("getText");
                fd.append('description', editor);
            } else {
            fd.append(input.name, input.value);
                
            }
        });
      

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: $(this).closest("form").attr('method'),
            url: $(this).closest("form").attr('action'),
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                
                if (data['status'] == '1') {
                    document.getElementById("alert").innerHTML = data['message'].substring(0, data[
                            'message']
                        .length);
                    $('.toast').toast('show');
           
                }
                if (data['reload']) {
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);

                }

            },
            error: function (data) {
                console.log(data);
            }
        });


    });
</script>
@endpush