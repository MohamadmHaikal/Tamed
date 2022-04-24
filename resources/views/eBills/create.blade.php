@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
    {!! Html::style('assets/css/ui-elements/buttons.css') !!}
@endpush

@section('content')
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
                                        href="javascript:void(0);">{{ __('backend.add invoice') }}</a>
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
                        
                        <form action="{{ request('id')!=null ? route('eBills.store', [request('id')]) : route('eBills.store') }}"
                            method="POST">
                            @csrf
                            <div class="row layout-top-spacing date-table-container">
                                <!-- Datatable go to last page -->


                                <div class="col-xl-6 col-lg-6 col-sm-6  layout-spacing">


                                    <div class="widget-content widget-content-area br-6">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="table-header">{{ __('backend.add invoice') }}</h4>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Invoice date') }}</label><input
                                                        type="date" name="Invoice_date" class="form-control mb-4"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.date of supply') }}</label><input
                                                        type="date" name="date_supply" class="form-control mb-4"> </div>
                                            </div>
                                        </div>
                                        <hr class="rounded" style=" border-top: 2.5px solid #e5eaff; ">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.customer name') }}</label><input
                                                        type="text" name="customer_name" class="form-control mb-4"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.address') }}</label><input
                                                        type="text" name="address" class="form-control mb-4"> </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Tax Number') }}</label><input
                                                        type="text" name="Tax_Number" class="form-control mb-4"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.responsible') }}</label><input
                                                        type="text" name="responsible" class="form-control mb-4"> </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.phone') }}</label><input type="text"
                                                        name="phone" class="form-control mb-4"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.email') }}</label><input type="text"
                                                        name="email" class="form-control mb-4"> </div>
                                            </div>


                                        </div>
                                        <hr class="rounded" style=" border-top: 2.5px solid #e5eaff;">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Bank name') }}</label><input
                                                        type="text" name="Bank_name" class="form-control mb-4"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.account name') }}</label><input
                                                        type="text" name="account_name" class="form-control mb-4"> </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.account number') }}</label><input
                                                        type="text" name="account_number" class="form-control mb-4"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Number of statement') }}</label><input
                                                        type="text" name="Number_statement" class="form-control mb-4">
                                                </div>
                                            </div>

                                        </div>
                                        <button type="submit" class="btn btn-info btn-rounded "
                                            style="    margin-right: 80%;">{{ __('backend.add') }}</button>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-sm-6  layout-spacing" id="product_card">


                                    <div class="widget-content widget-content-area br-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="table-header">{{ __('backend.product or service') }}</h4>

                                            </div>
                                            <div class="col-md-6">

                                                <button type="button" class="btn btn-info font-12" id="add_product"
                                                    data-id="1" style="    margin-right: 60%;"><i
                                                        class="las la-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.name of Service') }}</label><input
                                                        type="text" name="product_name[1]" class="form-control mb-4"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Quantity') }}</label><input
                                                        type="text" name="Quantity[1]" class="form-control mb-4"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Price') }}</label><input type="text"
                                                        name="Price[1]" class="form-control mb-4"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Discount') }}</label><input
                                                        type="text" name="Discount[1]" class="form-control mb-4" value="0"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Discount type') }}</label><select
                                                        name="Discount_type[1]" class="form-control mb-4">
                                                        <option value="1">{{ __('backend.Fixed value') }}</option>
                                                        <option value="2">{{ __('backend.percent') }}</option>
                                                    </select> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label
                                                        for="degree2">{{ __('backend.Tax') }}</label><input type="text"
                                                        name="Tax[1]" class="form-control mb-4"> </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </form>
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
@endpush
