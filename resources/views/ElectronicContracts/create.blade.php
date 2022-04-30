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
                                        class="needs-validation" novalidate enctype="multipart/form-data">
                                        @csrf
                                        {{-- <div class="row">

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

                                        </div> --}}
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="degree2">{{ __('backend.Commercial record') }}</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control" name="CRecord"
                                                            placeholder="{{ __('backend.Commercial Registration No') }}"
                                                            aria-describedby="inputGroupPrepend" required>
                                                        <i class="las la-check-circle" aria-hidden="true" style="position: absolute;
                                                                                                            top: 14px;
                                                                                                            right: 95%;
                                                                                                            color: green;
                                                                                                        "></i>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-soft-primary check "
                                                                type="button">{{ __('backend.check') }}</button>
                                                        </div>
                                                        <input type="text" class="form-control" name="customer" hidden
                                                            aria-describedby="inputGroupPrepend" required>
                                                        <div class="invalid-feedback">
                                                            {{ __('backend.Commercial Registration Required') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="company-info">

                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.responsible') }}</label><input
                                                        type="text" name="responsible" class="form-control"
                                                        aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Responsible Name Required') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.phone') }}</label><input type="text"
                                                        name="phone" class="form-control"
                                                        aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Mobile number is required') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.name of company') }}</label><input
                                                        type="text" name="company_name" class="form-control mb-4"> </div>
                                            </div>

                                        </div> --}}
                                        <hr class="rounded"
                                            style=" border-top: 2.5px solid #e5eaff; margin-left: 15%;">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.contract number') }}</label><input
                                                        type="text" name="contract_number" class="form-control "
                                                        aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Contract number is required') }}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Brief description') }}</label>
                                                    <textarea type="text" name="Brief_description" class="form-control " row="2" aria-describedby="inputGroupPrepend"
                                                        required></textarea>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Brief Description Required') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="rounded"
                                            style=" border-top: 2.5px solid #e5eaff; margin-left: 15%;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Date of contract') }}</label><input
                                                        type="date" name="contract_date" class="form-control "
                                                        aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Contract date required') }}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Contract start date') }}</label><input
                                                        type="date" name="date_start" class="form-control "
                                                        aria-describedby="inputGroupPrepend" required>

                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Contract start date required') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Contract end date') }}</label><input
                                                        type="date" name="date_end" class="form-control "
                                                        aria-describedby="inputGroupPrepend" required>

                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Contract end date required') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.renewable') }}</label>
                                                    <select class="form-control" name="renewable"
                                                        aria-describedby="inputGroupPrepend" required>

                                                        <option value="1">{{ __('backend.yes') }}</option>
                                                        <option value="0">{{ __('backend.no') }}</option>


                                                    </select>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Renewable is required') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="rounded"
                                            style=" border-top: 2.5px solid #e5eaff; margin-left: 15%;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Contract amount') }}</label><input
                                                        type="text" name="amount" class="form-control "
                                                        aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.The total amount of the contract value is required') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Payment system') }}</label><select
                                                        name="Payment_system" class="form-control mb-4">
                                                        <option value="Fixed value">{{ __('backend.Fixed value') }}
                                                        </option>
                                                        <option value="percent">{{ __('backend.percent') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.The first batch') }}</label><input
                                                        type="text" name="batch[1]" class="form-control "
                                                        aria-describedby="inputGroupPrepend" required>

                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Payment required') }}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.second batch') }}</label><input
                                                        type="text" name="batch[2]" class="form-control "
                                                        aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Payment required') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.third batch') }}</label><input
                                                        type="text" name="batch[3]" class="form-control "
                                                        aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Payment required') }}
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="batchs">

                                        </div>
                                        <button type="button" class="btn btn-outline-primary btn-rounded mb-3 add-batch"
                                            data-id="3"><i
                                                class="las la-plus font-15"></i>{{ __('backend.Add a new batch') }}
                                        </button>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.final batch') }}</label><input
                                                        type="text" name="final_batch" class="form-control "
                                                        aria-describedby="inputGroupPrepend" required>

                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Final payment required') }}
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <hr class="rounded"
                                            style=" border-top: 2.5px solid #e5eaff; margin-left: 15%;">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.city') }}</label>
                                                    <select class="form-control" name="city_id"
                                                        aria-describedby="inputGroupPrepend" required>
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
                                                    <textarea type="text" name="description" class="form-control " row="3" aria-describedby="inputGroupPrepend"
                                                        required></textarea>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Contract details are required') }}
                                                    </div>
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
                                                            style="display: none;" aria-describedby="inputGroupPrepend"
                                                            required>

                                                    </div>

                                                    </p>
                                                    <div class="invalid-feedback">
                                                        {{ __('backend.Contract details are required') }}
                                                    </div>
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
    {!! Html::script('assets/js/myJS.js') !!}
@endpush

@push('custom-scripts')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                            if ($('[name="Contract_file"]').val() != null) {

                                document.getElementById("alert").innerHTML =
                                    '<div style="position:fixed; bottom: 15px; right: 0;z-index: 9999; margin-left: 20px; margin-right: 20px;"> <div class="toast toast-danger fade hide" role="alert" data-delay="2000" aria-live="assertive"  aria-atomic="true"><div class="toast-header-danger"> <strong class="mr-auto" id="mr-auto">' +
                                    window.translation.systemMessages +
                                    '</strong><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> <div class="toast-body" id="toast-body">' +
                                    window.translation.AttachedRequired + '</div></div></div>';
                                $('.toast').toast('show');
                            } else {
                                document.getElementById("alert").innerHTML =
                                    '<div style="position:fixed; bottom: 15px; right: 0;z-index: 9999; margin-left: 20px; margin-right: 20px;"> <div class="toast toast-danger fade hide" role="alert" data-delay="2000" aria-live="assertive"  aria-atomic="true"><div class="toast-header-danger"> <strong class="mr-auto" id="mr-auto">' +
                                    window.translation.systemMessages +
                                    '</strong><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button></div> <div class="toast-body" id="toast-body">' +
                                    window.translation.AllRequired + '</div></div></div>';
                                $('.toast').toast('show');
                            }
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
@endpush
