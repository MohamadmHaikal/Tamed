@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('assets/css/loader.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
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
                                <li class="breadcrumb-item"><a
                                        href="javascript:void(0);">{{ __('backend.Create a contract') }}</a>
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
        <div class="layout-top-spacing mb-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing date-table-container">
                            <!-- Datatable go to last page -->

                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">


                                <div class="widget-content widget-content-area br-6 ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="table-header">{{ __('backend.Create a contract') }}</h4>

                                        </div>

                                    </div>
                                    <form action="{{ route('ElectronicContracts.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.company type') }}</label>
                                                    <select class="form-control" name="type_id">
                                                        @foreach ($types as $type)
                                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                        @endforeach


                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Commercial record') }}</label><input
                                                        type="text" name="CRecord" class="form-control mb-4"> </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.name of company') }}</label><input
                                                        type="text" name="company_name" class="form-control mb-4"> </div>
                                            </div>

                                        </div>
                                        <hr class="rounded"
                                            style=" border-top: 2.5px solid #e5eaff; margin-left: 15%;">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.contract number') }}</label><input
                                                        type="text" name="contract_number" class="form-control mb-4"> </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Brief description') }}</label>
                                                    <textarea type="text" name="Brief_description" class="form-control mb-4" row="2"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="rounded"
                                            style=" border-top: 2.5px solid #e5eaff; margin-left: 15%;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Date of contract') }}</label><input
                                                        type="date" name="contract_date" class="form-control mb-4"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Contract start date') }}</label><input
                                                        type="date" name="date_start" class="form-control mb-4"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Contract end date') }}</label><input
                                                        type="date" name="date_end" class="form-control mb-4"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.renewable') }}</label>
                                                    <select class="form-control" name="renewable">

                                                        <option value="1">{{ __('backend.yes') }}</option>
                                                        <option value="0">{{ __('backend.no') }}</option>


                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="rounded"
                                            style=" border-top: 2.5px solid #e5eaff; margin-left: 15%;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Contract amount') }}</label><input
                                                        type="text" name="amount" class="form-control mb-4">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.The first batch') }}</label><input
                                                        type="text" name="first_batch" class="form-control mb-4"> </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.second batch') }}</label><input
                                                        type="text" name="second_batch" class="form-control mb-4"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.third batch') }}</label><input
                                                        type="text" name="third_batch" class="form-control mb-4"> </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.final batch') }}</label><input
                                                        type="text" name="final_batch" class="form-control mb-4"> </div>
                                            </div>


                                        </div>
                                        <hr class="rounded"
                                            style=" border-top: 2.5px solid #e5eaff; margin-left: 15%;">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.city') }}</label>
                                                    <select class="form-control" name="city_id">
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}">{{ $city->name }}
                                                            </option>
                                                        @endforeach


                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Contract details') }}</label>
                                                    <textarea type="text" name="description" class="form-control mb-4" row="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div>
                                                        <label for="file">
                                                            <a data-placement="top"
                                                                title="{{ __('backend.Attached contract file') }}"
                                                                class="mr-2 pointer text-primary btn btn-outline-primary bs-tooltip">
                                                                <i class="las la-paperclip font-20"></i>
                                                                {{ __('backend.Attached contract file') }}
                                                            </a>
                                                        </label>
                                                        <input id="file" name='Contract_file' type="file"
                                                            style="display:none;">
                                                    </div>

                                                    </p>
                                                </div>
                                            </div>
                                        </div>



                                        <button type="submit" class="btn btn-primary"
                                            style="margin-right: 85%;">{{ __('backend.Create a contract') }}</button>
                                    </form>
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
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
    <!--  The following JS library files are loaded to use Copy CSV Excel Print Options-->
    {!! Html::script('plugins/table/datatable/button-ext/dataTables.buttons.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/jszip.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/buttons.html5.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/buttons.print.min.js') !!}
    <!-- The following JS library files are loaded to use PDF Options-->
    {!! Html::script('plugins/table/datatable/button-ext/pdfmake.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/vfs_fonts.js') !!}
@endpush


@push('custom-scripts')
    {!! Html::script('plugins/notification/snackbar/snackbar.min.js') !!}
    {!! Html::script('assets/js/basicui/notifications.js') !!}
@endpush

@push('custom-scripts')
@endpush
