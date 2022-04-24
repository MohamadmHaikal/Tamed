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
    $author = get_user_by_id($invoice->user_id);
    
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
                                        href="javascript:void(0);">{{ __('backend.Invoice details') }}</a>
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
                                            <button class="btn btn-primary " onClick="printdiv('invoice-body');"
                                                style="margin-right: 80%;">{{ __('backend.print') }}</button>
                                        </div>
                                    </div>

                                    <div class="invoice-container" id="invoice-body">
                                        <div class="invoice-inbox" style="height:auto;">


                                            <div id="ct" class="" style="display: flex; ">

                                                <div class="invoice">
                                                    <div class="content-section  animated animatedFadeInUp fadeInUp"
                                                        style="height:auto;">
                                                        <div class="row inv--head-section" style="    margin-bottom: 15px;">

                                                            <div class="col-sm-6 col-12">
                                                                <h6 class="in-heading mb-3">{{ $author->name }}</h6>
                                                                <h6 class="in-heading mb-3">العنوان:
                                                                    {{ get_location_by_id($author->neighbor_id) }}</h6>
                                                                <h6 class="in-heading">الرقم الضريبي :
                                                                    {{ $author->TaxNumber }}
                                                                </h6>
                                                                <h6 class="in-heading">الرقم المميز:
                                                                    {{ $author->specialNumber }}</h6>
                                                                <h6 class="in-heading mb-3">رقم السجل التجاري:
                                                                    {{ $author->CRecord }}
                                                                </h6>
                                                                <h6 class="in-heading">البريد الالكتروني :
                                                                    {{ $author->email }}</h6>
                                                                <h6 class="in-heading">رقم الجول :
                                                                    {{ $author->phone }}
                                                                </h6>
                                                            </div>
                                                            <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                                <div class="">
                                                                    <img src="{{ url("/image/$author->invoiceLogo") }}"
                                                                        style="    width: 35%;
                                                                                                                                    margin-left: 16%;
                                                                                                                                " />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-sm-3"
                                                                style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                فاتورة رقم: {{ $invoice->id }}</div>
                                                            <div class="col-sm-3"
                                                                style="border: 2px solid #dae1e7 ; margin-left: 5px;">
                                                                التاريخ:
                                                                {{ date('Y-m-d', strtotime($invoice->created_at)) }}
                                                            </div>
                                                            <div class="col-sm-5 mr-1"
                                                                style="border: 2px solid #dae1e7;    margin-left: 3px;">
                                                                تاريخ التوريد : {{ $invoice->supply_date }}</div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-sm-2 pt-1 pb-1"
                                                                style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                اسم العميل</div>
                                                            <div class="col-sm-6"
                                                                style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                {{ $invoice->customer_name }}
                                                            </div>

                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-sm-2 pt-1 pb-1"
                                                                style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                العنوان </div>
                                                            <div class="col-sm-4"
                                                                style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                {{ $invoice->address }}
                                                            </div>
                                                            <div class="col-sm-2 pt-1 pb-1"
                                                                style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                الرقم الضريبي</div>
                                                            <div class="col-sm-3"
                                                                style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                {{ $invoice->TaxNumber }}
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-sm-2 pt-1 pb-1"
                                                                style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 8px;">
                                                                المسئول </div>
                                                            <div class="col-sm-9"
                                                                style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                {{ $invoice->responsible }}
                                                            </div>

                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-sm-2 pt-1 pb-1"
                                                                style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                رقم الجوال </div>
                                                            <div class="col-sm-4"
                                                                style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                {{ $invoice->phone }}
                                                            </div>
                                                            <div class="col-sm-2 pt-1 pb-1"
                                                                style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                الايميل </div>
                                                            <div class="col-sm-3"
                                                                style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                {{ $invoice->email }}
                                                            </div>
                                                        </div>
                                                        <div class="row inv--product-table-section" style="margin-top: 10px;
                                                                                                    margin-bottom: 0px;">
                                                            <div class="col-12" style="padding-right: 0px;">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead class="">
                                                                            <tr>
                                                                                <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">
                                                                                    {{ __('#') }}</th>
                                                                                <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">المنتج او
                                                                                    الخدمة</th>
                                                                                <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">
                                                                                    الكمية</th>
                                                                                <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">
                                                                                    القيمة</th>
                                                                                <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">
                                                                                    الخصم</th>
                                                                                <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">
                                                                                    المبلغ الخاضع لضريبة القيمة المضافة</th>
                                                                                <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">
                                                                                    نسبة ضريبة القيمة المضافة</th>
                                                                                <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">
                                                                                    مبلغ ضريبة القيمة المضافة</th>
                                                                                <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">
                                                                                    الأجمالي شامل ضريبة القيمة المضافة</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $i = 1;
                                                                            ?>
                                                                            <tr>
                                                                                @foreach ($products as $product)
                                                                                    <td>{{ $i++ }}</td>
                                                                                    <td>{{ $product->name }}</td>
                                                                                    <td class="text-left">
                                                                                        {{ $product->quantity }}</td>
                                                                                    <td class="text-left">
                                                                                        {{ number_format($product->value, 2, '.', ',') }}
                                                                                    </td>
                                                                                    <td class="text-left">
                                                                                        {{ number_format($product->discount, 2, '.', ',') }}{{ $product->discount_type == 1 ? __('backend.Rial') : '%' }}
                                                                                    </td>
                                                                                    <td class="text-left">
                                                                                        {{ number_format($product->Taxable_amount, 2, '.', ',') }}
                                                                                    </td>
                                                                                    <td class="text-left">
                                                                                        %{{ number_format($product->tax_rate, 2, '.', ',') }}
                                                                                    </td>
                                                                                    <td class="text-left">
                                                                                        {{ number_format($product->tax_amount, 2, '.', ',') }}
                                                                                    </td>
                                                                                    <td class="text-left">
                                                                                        {{ number_format($product->total, 2, '.', ',') }}
                                                                                    </td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row inv--product-table-section" style="margin-top: 10px;
                                                                                    margin-bottom: 0px;">
                                                            <div class="col-12" style="padding-right: 0px;">
                                                                <div class="table-responsive">
                                                                    <table class="table">

                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="padding-left: 128px;">الأجمالي
                                                                                </td>
                                                                                <td>اجمالي الخصم</td>
                                                                                <td class="text-left">الاجمالي الخاضع
                                                                                    لضريبة القيمة المضافة</td>
                                                                                <td class="text-left">
                                                                                    اجمالي ضريبة القيمةالمضافة</td>
                                                                                <td class="text-left">
                                                                                    الاجمالي الشامل لضريبة القيمة المضافة
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="padding-left: 128px;"></td>
                                                                                <td> {{ number_format($Ttotal['discount'], 2, '.', ',') }}
                                                                                </td>
                                                                                <td class="text-left">
                                                                                    {{ number_format($Ttotal['Taxable_amount'], 2, '.', ',') }}
                                                                                </td>
                                                                                <td class="text-left">
                                                                                    {{ number_format($Ttotal['tax_amount'], 2, '.', ',') }}
                                                                                </td>
                                                                                <td class="text-left">
                                                                                    {{ number_format($Ttotal['total'], 2, '.', ',') }}
                                                                                </td>
                                                                            </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="inv--payment-info" style="margin-bottom:-40px; ">
                                                            <div class="">
                                                                <div class="col-sm-12 col-12">
                                                                    <h6 class=" inv-title">
                                                                        {{ __('تفاصيل الحساب البنكي') }}</h6>
                                                                </div>
                                                                <div class="row mt-1">
                                                                    <div class="col-sm-2 pt-1 pb-1"
                                                                        style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                        اسم البنك </div>
                                                                    <div class="col-sm-9"
                                                                        style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                        {{ $invoice->Bank_name }}
                                                                    </div>

                                                                </div>
                                                                <div class="row mt-1">
                                                                    <div class="col-sm-2 pt-1 pb-1"
                                                                        style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                        اسم الحساب </div>
                                                                    <div class="col-sm-9"
                                                                        style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                        {{ $invoice->account_name }}
                                                                    </div>

                                                                </div>
                                                                <div class="row mt-1">
                                                                    <div class="col-sm-2 pt-1 pb-1"
                                                                        style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                        رقم الحساب</div>
                                                                    <div class="col-sm-9"
                                                                        style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                        {{ $invoice->account_number }}
                                                                    </div>

                                                                </div>
                                                                <div class="row mt-1">
                                                                    <div class="col-sm-2 pt-1 pb-1"
                                                                        style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                        رقم البيان </div>
                                                                    <div class="col-sm-9"
                                                                        style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                        {{ $invoice->IBAN }}
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>



                                                        <div class="row inv--product-table-section">
                                                            <div class="col-12 " style="padding-right: 0px;">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead class="table">

                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                                $data = serialize(array("Red", "Green", "Blue"));
                                                                                ?>
                                                                            <tr>
                                                                                <td
                                                                                    style="width: 50%;
                                                                                                                                                        text-align: center;">
                                                                                    {!! QrCode::size(150)->generate($data) !!}
                                                                                </td>

                                                                                <td class="text-center"
                                                                                    style="width: 50%;"><img
                                                                                        src="{{ url("/image/$author->Signature") }}">
                                                                                </td>

                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="footer-contact">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <p class="">
                                                                        {{ "Email: $author->email | Contact: $author->phone " }}
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
@endpush


@push('custom-scripts')
@endpush

@push('custom-scripts')
    <script language="javascript">
        function printdiv(printpage) {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
        }
    </script>
@endpush
