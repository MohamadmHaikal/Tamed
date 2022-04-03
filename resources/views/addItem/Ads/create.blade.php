@extends('layout.master')

@push('plugin-styles')
{!! Html::style('assets/css/forms/form-widgets.css') !!}
{!! Html::style('assets/css/forms/multiple-step.css') !!}

{!! Html::style('plugins/flatpickr/flatpickr.css') !!}
{!! Html::style('plugins/flatpickr/custom-flatpickr.css') !!}
{!! Html::style('assets/css/forms/switch-theme.css') !!}
{!! Html::style('assets/css/forms/radio-theme.css') !!}
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Forms')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>{{__('Forms')}}Multiple
                                    Step</span></li>
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
                            <div class="statbox widget box box-shadow mb-4">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Step Type 2</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area"
                                    style="background: linear-gradient(to right, #7988d1 0%, #2f44b2 100%);">
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="card multiple-form-two px-0 pb-0 mb-3">
                                                <h5 class="text-center"><strong>{{__('Forms')}}Sign Up Your User
                                                        Account</strong></h5>
                                                <p class="text-center">{{__('Forms')}}Fill all form field to go to next
                                                    step</p>
                                                <form id="msform" method = {{ isset($item) ? 'PUT' : 'POST' }} action="{{ isset($item) ? route('ads.update', $item->id) :  route('ads.store')  }}"  enctype="multipart/form-data">
                                                    <input type="hidden" name="user_id" placeholder="" value="{{ get_current_user_id()}}"
                                                    class="form-control mb-3" />
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                            role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div> <br>
                                                    <fieldset>
                                                        <div class="form-card">
                                                            <div class="row">
                                                                <div class="col-7">
                                                                    <h2 class="fs-title mb-4">{{__('Forms')}}Account
                                                                        Information:</h2>
                                                                </div>
                                                                <div class="col-5">
                                                                    <h2 class="steps">{{__('Forms')}}Step 1 - 4</h2>
                                                                </div>
                                                            </div>
                                                            <label class="fieldlabels">{{__('title')}}</label>
                                                            <input type="text" name="title" placeholder=""
                                                            value="{{ isset($item) ? $item->title : '' }}"
                                                                class="form-control mb-3" />
                                                            <label class="fieldlabels">{{__('description')}}</label>
                                                            <input type="text" name="description" placeholder=""
                                                            value="{{ isset($item) ? $item->description : '' }}"
                                                                class="form-control mb-3" />
                                                            {{-- <label class="fieldlabels">{{__('type')}}</label> --}}
                                                            <div class="form-group">
                                                                <label for="exampleSelectl">{{__('type')}}</label>
                                                                <select class="form-control form-control-lg" id="type"
                                                                    name="type">
                                                                    <option value="Project">
                                                                        {{__('backend.Contracting Project')}}</option>
                                                                    <option value="deals">{{__('backend.deals')}}
                                                                    </option>
                                                                    <option value="Auctions">{{__('backend.Auctions')}}
                                                                    </option>
                                                                    <option value="Material">{{__('backend.Material')}}
                                                                    </option>
                                                                    <option value="equipment">
                                                                        {{__('backend.equipment')}}</option>
                                                                    <option value="job">{{__('backend.job')}}</option>
                                                                </select>
                                                            </div>
                                                            {{-- <input type="text" name="type" placeholder="" class="form-control mb-3"/> --}}
                                                            <label class="fieldlabels">{{__('city')}}</label>
                                                            <input type="text" name="city" placeholder=""
                                                               value="{{ isset($item) ? $item->city : '' }}"
                                                                class="form-control mb-3" />
                                                            <label class="fieldlabels">{{__('neighborhood')}}</label>
                                                            <input type="text" name="neighborhood" placeholder=""
                                                               value="{{ isset($item) ? $item->neighborhood : '' }}"
                                                                class="form-control mb-3" />
                                                        </div>
                                                        <input type="button" name="next"
                                                            class="next action-button btn btn-primary"
                                                            value="{{__('Forms')}}Next" />
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-card">
                                                            <div class="row">
                                                                <div class="col-7">
                                                                    <h2 class="fs-title mb-4">{{__('Forms')}}Personal
                                                                        Information:</h2>
                                                                </div>
                                                                <div class="col-5">
                                                                    <h2 class="steps">{{__('Forms')}}Step 2 - 4</h2>
                                                                </div>
                                                            </div>
                                                            <div id="inputsAds"></div>

                                                            <label class="fieldlabels">{{__('startdate')}}</label>
                                                            <input id="basicExample" name="startdate"
                                                              value="{{ isset($item) ? $item->startdate : '' }}"
                                                                class="form-control flatpickr flatpickr-input active basicExample"
                                                                type="text" placeholder="{{__('Select Date')}}">
                                                            <label class="fieldlabels">{{__('deadline')}}</label>
                                                            <input id="basicExample" name="deadline"
                                                              value="{{ isset($item) ? $item->deadline : '' }}"
                                                                class="form-control flatpickr flatpickr-input active basicExample"
                                                                type="text" placeholder="{{__('Select Date')}}">
                                                            <label class="fieldlabels">{{__('Price')}}</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend col-md-6">
                                                                    <label
                                                                        for="">{{__('total value to project')}}</label>

                                                                    <input type="text" name="price" id="price"
                                                                      value="{{ isset($item) ? $item->price : '' }}"
                                                                        placeholder="" class="form-control" disabled />
                                                                </div>
                                                                <div
                                                                    class="input-group-prepend col-md-6 switch-outer-container">
                                                                    <label for=""> {{__('best price')}}</label>

                                                                    <span
                                                                        class="switch switch-outline switch-icon switch-primary">
                                                                        <label>

                                                                            <input type="checkbox" id="bestPrice"
                                                                              value="{{ isset($item) ? $item->bestPrice : '' }}"
                                                                                checked="checked" name="pricestatus">
                                                                                
                                                                            <span></span>
                                                                        </label>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            @php
                                                                $activityItem = getActivityItem();
                                                            @endphp
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleSelectl">{{__('Submit Project To')}}</label>
                                                                <select class="form-control form-control-lg" id="type"
                                                                    name="activitie_id">
                                                                    @foreach ($activityItem as $activity)
                                                                    <option value="{{  $activity->id }}"  {{ isset($item) && $item->activity()->first()->id==$activity->id ? 'selected' :'' }} >{{  $activity->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <input type="button" name="previous"
                                                            class="previous action-button-previous btn btn-outline-primary"
                                                            value="{{__('Forms')}}Previous" />
                                                        <input type="button" name="next"
                                                            class="next action-button btn btn-primary"
                                                            value="{{__('Forms')}}Next" />
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-card">
                                                            <div class="row">
                                                                <div class="col-7">
                                                                    <h2 class="fs-title mb-4">{{__('Image Upload')}}:
                                                                    </h2>
                                                                </div>
                                                                <div class="col-5">
                                                                    <h2 class="steps">{{__('Forms')}}Step 3 - 4</h2>
                                                                </div>
                                                            </div>
                                                            <div id="ImgContent" class="row fileContent">

                                                            </div>

                                                            <label for="file-upload" class="custom-file-upload mb-0">
                                                                <a title="Attach a file"
                                                                    class="mr-2 pointer text-primary">
                                                                    <i class="las la-paperclip font-20"></i>
                                                                    <span
                                                                        class="font-17">{{__('Click here to attach an image/video')}}</span>
                                                                </a>
                                                            </label>
                                                            <input id="file-upload" name='upload_cont_img[]' multiple class="file-upload"
                                                                type="file" accept="image/*,video/*"
                                                                style="display:none;">

                                                        </div>
                                                        <div class="form-card">
                                                            <div class="row">
                                                                <div class="col-7">
                                                                    <h2 class="fs-title mb-4">{{__('File Upload')}}:
                                                                    </h2>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div id="55" class="row fileContent">

                                                                    </div>

                                                                    <label for="file-upload"
                                                                        class="custom-file-upload mb-0">
                                                                        <a title="Attach a file"
                                                                            class="mr-2 pointer text-primary btn btn-outline-primary">
                                                                            <i class="las la-paperclip font-20"></i>
                                                                            <span
                                                                                class="font-17">{{__('Specifications + Quantities')}}</span>
                                                                        </a>
                                                                    </label>
                                                                    <input class="file-upload"
                                                                        name='upload_Specif_Quant[]' multiple
                                                                        type="file" accept="image/*,video/*"
                                                                        style="display:none;">

                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div id="55" class="row fileContent">

                                                                    </div>

                                                                    <label for="file-upload"
                                                                        class="custom-file-upload mb-0">
                                                                        <a title="Attach a file"
                                                                            class="mr-2 pointer text-primary btn btn-outline-primary">
                                                                            <i class="las la-paperclip font-20"></i>
                                                                            <span
                                                                                class="font-17">{{__('3D files upload')}}</span>
                                                                        </a>
                                                                    </label>
                                                                    <input class="file-upload" name='upload_3D_files[]'
                                                                        multiple type="file"
                                                                        accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf"
                                                                        style="display:none;">

                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div id="55" class="row fileContent">

                                                                    </div>

                                                                    <label for="file-upload"
                                                                        class="custom-file-upload mb-0">
                                                                        <a title="Attach a file"
                                                                            class="mr-2 pointer text-primary btn btn-outline-primary">
                                                                            <i class="las la-paperclip font-20"></i>
                                                                            <span
                                                                                class="font-17 ">{{__('Upload project plans')}}</span>
                                                                        </a>
                                                                    </label>
                                                                    <input class="file-upload"
                                                                        name='upload_project_plans[]' multiple
                                                                        type="file" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                                                                text/plain, application/pdf" style="display:none;">

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <input type="button" name="previous"
                                                            class="previous action-button-previous btn btn-outline-primary"
                                                            value="{{__('Forms')}}Previous" />
                                                        <input type="button" name="next" id="createItem"

                                                            class="next action-button btn btn-primary"
                                                            value="{{__('Forms')}}Next" />
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-card">
                                                            <div class="row">
                                                                <div class="col-7">
                                                                    <h2 class="fs-title mb-4">{{__('Forms')}}Finish:
                                                                    </h2>
                                                                </div>
                                                                <div class="col-5">
                                                                    <h2 class="steps">{{__('Forms')}}Step 4 - 4</h2>
                                                                </div>
                                                            </div> <br><br>
                                                            <h5 class="fs-title mb-4 text-center">
                                                                {{__('Forms')}}Congrats !</h5><br>
                                                            <div class="row justify-content-center">
                                                                <div class="col-3">
                                                                    <svg class="checkmark"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 52 52">
                                                                        <circle class="checkmark__circle" cx="26"
                                                                            cy="26" r="25" fill="none" />
                                                                        <path class="checkmark__check" fill="none"
                                                                            d="M14.1 27.2l7.1 7.2 16.7-16.8" /></svg>
                                                                </div>
                                                            </div> <br><br>
                                                            <div class="row justify-content-center">
                                                                <div class="col-7 text-center">
                                                                    <p>{{__('Forms')}}You Have Successfully Signed Up
                                                                    </p>
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
<!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
{!! Html::script('assets/js/forms/multiple-step.js') !!}
{!! Html::script('plugins/flatpickr/flatpickr.js') !!}
{!! Html::script('plugins/flatpickr/custom-flatpickr.js') !!}
{{-- {!! Html::script('assets/js/myJS.js') !!} --}}
@endpush

@push('custom-scripts')
<script>
    $('#type').on('change', function () {
        var id = this.value;
        $('#inputsAds').empty();
        var url = "{{ URL::to('getType') }}/" + id;
        $.ajax({
            url: url,
            type: "get",
            contentType: 'application/json',
            success: function (data) {
                $('#inputsAds').append(data);
            },
            error: function (xhr) {}
        });
    });
    $("#bestPrice").change(function () {
        if ($(this).prop("checked") == true) {
            $("#price").prop('disabled', true);
        } else {
            $("#price").prop('disabled', false);

        }
    });
    
    $('#createItem').on('click', function () {
        var fd = new FormData();
             var files = $(".file-upload")[0].files;
             let form = $(this).closest("form").serializeArray();

              for (var i = 0; i < files.length; i++) {
                  fd.append(i, $(".file-upload").get(0).files[i]);
              }
              $.each( form,function(key,input){
                    fd.append(input.name,input.value);
                });
            //     console.log(fd);

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:  $(this).closest("form").attr('method'),
            url: $(this).closest("form").attr('action'),
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                if (data['status'] == '1') {
                    document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
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