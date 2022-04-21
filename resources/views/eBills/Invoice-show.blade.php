@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
    {!! Html::style('assets/css/ui-elements/buttons.css') !!}
    {!! Html::style('assets/css/apps/invoice.css') !!}
    
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('backend.Invoice details') }}</a>
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


                                <div class="widget-content widget-content-area br-6">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="table-header">{{ __('backend.Invoice details') }}</h4>

                                        </div>
                                        <div class="col-md-6">
                                            <button
                                            class="btn btn-primary action-print" style="margin-right: 80%;">{{ __('Print') }}</button>
                                        </div>
                                    </div>
                                    <div class="invoice-container">
                                        <div class="invoice-inbox" style="height:auto;">
                                            
                                            
                                            <div id="ct" class="" style="display: flex; ">

                                                <div class="invoice" >
                                                    <div class="content-section  animated animatedFadeInUp fadeInUp" style="height:auto;">
                                                        <div class="row inv--head-section">
                                                            <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                                <div class="company-info">
                                                                    <img src="{{ url("/image/$user->invoiceLogo") }}" style="width: 20%;" />
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-12">
                                                                <h3 class="in-heading">{{ __('Tax Invoice') }}</h3>
                                                            </div>
                                                        </div>
                                                        <div class="row inv--detail-section">
                                                            <div class="col-sm-7 align-self-center">
                                                                <p class="inv-to">{{ __('To') }}</p>
                                                            </div>
                                                            <div
                                                                class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                                <p class="inv-detail-title">{{ __('Invoice Details') }}
                                                                </p>
                                                            </div>
                                                            <div class="col-sm-7 align-self-center">
                                                                <p class="inv-customer-name">{{ __('Hethwoy Inc.') }}</p>
                                                                <p class="inv-street-addr">
                                                                    {{ __('91 Jamast Street, California, 245874') }}</p>
                                                                <p class="inv-email-address">{{ __('hethwoy@mail.com') }}
                                                                </p>
                                                            </div>
                                                            <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                                <p class="inv-list-number"><span
                                                                        class="inv-title">{{ __('Invoice Id :') }}
                                                                    </span> <span
                                                                        class="inv-number">{{ __('K5UI89OP78') }}</span>
                                                                </p>
                                                                <p class="inv-created-date"><span
                                                                        class="inv-title">{{ __('Date :') }} </span>
                                                                    <span
                                                                        class="inv-date">{{ __('11 April 2020') }}</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="row inv--product-table-section">
                                                            <div class="col-12">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead class="">
                                                                            <tr>
                                                                                <th scope="col">{{ __('S.No') }}</th>
                                                                                <th scope="col">{{ __('Items') }}</th>
                                                                                <th class="text-right" scope="col">
                                                                                    {{ __('Qty') }}</th>
                                                                                <th class="text-right" scope="col">
                                                                                    {{ __('Unit Price') }}</th>
                                                                                <th class="text-right" scope="col">
                                                                                    {{ __('Amount') }}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>1</td>
                                                                                <td>{{ __('Printer') }}</td>
                                                                                <td class="text-right">100</td>
                                                                                <td class="text-right">
                                                                                    {{ __('$300') }}</td>
                                                                                <td class="text-right">
                                                                                    {{ __('$30000') }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2</td>
                                                                                <td>{{ __('Mobile') }}</td>
                                                                                <td class="text-right">10</td>
                                                                                <td class="text-right">
                                                                                    {{ __('$50') }}</td>
                                                                                <td class="text-right">
                                                                                    {{ __('$500') }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3</td>
                                                                                <td>{{ __('Monitor') }}</td>
                                                                                <td class="text-right">30</td>
                                                                                <td class="text-right">
                                                                                    {{ __('$700') }}</td>
                                                                                <td class="text-right">
                                                                                    {{ __('$21000') }}</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-4">
                                                            <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                                <div class="inv--payment-info">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-12">
                                                                            <h6 class=" inv-title">
                                                                                {{ __('Bank Information:') }}</h6>
                                                                        </div>
                                                                        <div class="col-sm-12 col-12">
                                                                            <p class=" inv-subtitle">
                                                                                <span>{{ __('Bank Name:') }}</span>
                                                                                {{ __('Digital Bank of Commerce') }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-sm-12 col-12">
                                                                            <p class=" inv-subtitle">
                                                                                <span>{{ __('Account Number:') }}</span>
                                                                                {{ __('874574584512') }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-sm-12 col-12">
                                                                            <p class=" inv-subtitle">
                                                                                <span>{{ __('Payment Mode:') }}</span>
                                                                                {{ __('Cheque') }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-sm-12 col-12">
                                                                            <p class=" inv-subtitle">
                                                                                <span>{{ __('Transaction Id:') }}</span>
                                                                                {{ __('8HD5248ADSY') }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                                <div class="inv--total-amounts text-sm-right">
                                                                    <div class="row">
                                                                        <div class="col-sm-8 col-7">
                                                                            <p class="">
                                                                                {{ __('Sub Total:') }} </p>
                                                                        </div>
                                                                        <div class="col-sm-4 col-5">
                                                                            <p class="">{{ __('$51500') }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-sm-8 col-7">
                                                                            <p class="">
                                                                                {{ __('Tax Amount:') }} </p>
                                                                        </div>
                                                                        <div class="col-sm-4 col-5">
                                                                            <p class="">{{ __('$200') }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-sm-8 col-7">
                                                                            <p class=" discount-rate">
                                                                                {{ __('Discount :') }} <span
                                                                                    class="discount-percentage">5%</span>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-sm-4 col-5">
                                                                            <p class="">{{ __('$500') }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-sm-8 col-7 grand-total-title">
                                                                            <h4 class="">
                                                                                {{ __('Grand Total :') }} </h4>
                                                                        </div>
                                                                        <div class="col-sm-4 col-5 grand-total-amount">
                                                                            <h4 class="">
                                                                                {{ __('$51200') }}
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="footer-contact">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <p class="">
                                                                        {{ __('Email: info@mail.com | Contact: +1 5475-8244 | Website: www.website.com') }}
                                                                    </p>
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
    {!! Html::script('assets/js/apps/invoice.js') !!}
@endpush


@push('custom-scripts')
@endpush

@push('custom-scripts')
@endpush
