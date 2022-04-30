@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
    {!! Html::style('assets/css/ui-elements/buttons.css') !!}
    {!! Html::style('assets/css/basic-ui/custom_countdown.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('backend.eBills') }}</a>
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
                                            <h4 class="table-header">{{ __('backend.eBills') }}</h4>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-lg-12 mb-12">
                                                <div class="">

                                                    <div class="widget-content" style="padding: 0px;">
                                                        <p  class="countdown-subs" >{{__('backend.Remaining to subscribe')}}</p>
                                                        <div id="nocolor" class="square-countdown no-color"
                                                            style="justify-content: end;">
                                                            <div class="days" style="margin-right: 4px"><span
                                                                    class="count"
                                                                    style="width: auto; height: 43px;font-size: 15px;">00</span>
                                                                <span class="text"
                                                                    style="margin-top:0px">{{ __('backend.Days') }}</span>
                                                            </div>
                                                            <div class="hours" style="margin-right: 4px"><span
                                                                    class="count"
                                                                    style="width: auto; height: 43px;font-size: 15px;">00</span>
                                                                <span class="text"
                                                                    style="margin-top:0px">{{ __('backend.Hours') }}</span>
                                                            </div>
                                                            <div class="min" style="margin-right: 4px"><span
                                                                    class="count"
                                                                    style="width: auto;height: 43px;font-size: 15px;">00</span>
                                                                <span class="text"
                                                                    style="margin-top:0px">{{ __('backend.Mins') }}</span>
                                                            </div>
                                                            <div class="sec" style="margin-right: 4px"><span
                                                                    class="count"
                                                                    style="width: auto; height: 43px; font-size: 15px;">00</span>
                                                                <span class="text"
                                                                    style="margin-top:0px">{{ __('backend.Secs') }}</span>
                                                            </div>

                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="table-responsive mb-4">
                                        <div class="widget-content widget-content-area text-center">
                                            <div class="button-list">
                                                <a href="{{ route('eBills') }}">
                                                    <button type="button"
                                                        class="btn btn-primary btn-rounded">{{ __('backend.all Invoices') }}</button></a>
                                                <a href="{{ route('eBills', ['source' => 'issued']) }}">
                                                    <button type="button"
                                                        class="btn btn-info btn-rounded">{{ __('backend.Invoices issued') }}</button>
                                                </a>
                                                <a href="{{ route('eBills', ['source' => 'received']) }}">
                                                    <button type="button"
                                                        class="btn btn-warning btn-rounded">{{ __('backend.Invoices received') }}</button>
                                                </a>
                                                <a href="{{ route('eBills.create') }}"><button type="button"
                                                        class="btn btn-success btn-rounded">{{ __('backend.add new') }}</button>
                                                </a>
                                                <input id="date" value="{{$date}}" hidden>
                                            </div>
                                        </div>
                                        <table id="export-dt" class="table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('backend.invoice number') }}</th>
                                                    <th>{{ __('backend.customer name') }}</th>
                                                    <th>{{ __('backend.responsible') }}</th>
                                                    <th>{{ __('backend.Invoice date') }}</th>
                                                    <th class="no-content text-center" style="padding-right:0px;">
                                                        {{ __('backend.Invoice details') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($invoices as $invoice)
                                                    <tr>
                                                        <td>{{ $invoice->id }}</td>
                                                        <td>{{ $invoice->customer_name }}</td>
                                                        <td>{{ $invoice->responsible }}</td>
                                                        <td>{{ date('Y-m-d', strtotime($invoice->invoice_date)) }}</td>
                                                        <td class="text-center">
                                                            <div class="dropdown custom-dropdown">
                                                                <a class="text-primary"
                                                                    href="{{ route('eBills.show', [$invoice->id]) }}">
                                                                    {{ __('backend.Invoice details') }}
                                                                </a>
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
    {!! Html::script('plugins/countdown/jquery.countdown.min.js') !!}
@endpush

@push('custom-scripts')
    <script>
        (function($) {
            "use strict";
           
            var date = document.getElementById("date").value;
            var countDownDate = new Date(date).getTime();
            var countdownfunction = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById("nocolor").innerHTML =
                    '<div class="days" style="margin-right: 4px"><span class="count" style="width: auto; height: 43px; font-size: 15px;">' +
                    days +
                    '</span> <span class="text" style="margin-top:0px">' + window.translation.Days +
                    '</span></div>' +
                    '<div class="hours " style="margin-right: 4px"><span class="count" style="width: auto; height: 43px; font-size: 15px;">' +
                    hours +
                    '</span> <span class="text" style="margin-top:0px">' + window.translation.Hours +
                    '</span></div>' +
                    '<div class="min" style="margin-right: 4px"><span class="count" style="width: auto; height: 43px; font-size: 15px;">' +
                    minutes +
                    '</span> <span class="text" style="margin-top:0px">' + window.translation.Mins +
                    '</span></div>' +
                    '<div class="sec" style="margin-right: 4px"><span class="count"style="width: auto; height: 43px; font-size: 15px;">' +
                    seconds +
                    '</span> <span class="text" style="margin-top:0px">' + window.translation.Secs +
                    '</span></div>';


                if (distance < 0) {

                    clearInterval(countdownfunction);
                    document.getElementById("nocolor").innerHTML = "EXPIRED";
                }
            }, 1000);

        })(jQuery);

        $('#Show').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget);
            var ModalType = button.data('type')
            var name = button.data('name')
            var userType = button.data('usertype')
            console.log(userType);
            $("#name").prop('disabled', ModalType == null ? false : true);
            $("#type_id").prop('disabled', ModalType == null ? false : true);
            var modal = $(this)
            modal.find('.modal-body #name').val(name)
            modal.find('.modal-body #type_id').val(userType)
        });
        $(document).ready(function() {
            $('#basic-dt').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5, 10, 15, 20],
                "pageLength": 5
            });
            $('#dropdown-dt').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5, 10, 15, 20],
                "pageLength": 5
            });
            $('#last-page-dt').DataTable({
                "pagingType": "full_numbers",
                "language": {
                    "paginate": {
                        "first": "<i class='las la-angle-double-left'></i>",
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>",
                        "last": "<i class='las la-angle-double-right'></i>"
                    }
                },
                "lengthMenu": [3, 6, 9, 12],
                "pageLength": 9
            });
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = parseInt($('#min').val(), 10);
                    var max = parseInt($('#max').val(), 10);
                    var age = parseFloat(data[3]) || 0; // use data for the age column
                    if ((isNaN(min) && isNaN(max)) ||
                        (isNaN(min) && age <= max) ||
                        (min <= age && isNaN(max)) ||
                        (min <= age && age <= max)) {
                        return true;
                    }
                    return false;
                }
            );
            var table = $('#range-dt').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5, 10, 15, 20],
                "pageLength": 5
            });
            $('#min, #max').keyup(function() {
                table.draw();
            });
            $('#export-dt').DataTable({
                dom: '<"row"<"col-md-6"B><"col-md-6"f> ><""rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>>',
                buttons: {
                    buttons: [{
                            extend: 'copy',
                            className: 'btn btn-primary'
                        },

                        {
                            extend: 'excel',
                            className: 'btn btn-primary'
                        },

                        {
                            extend: 'print',
                            className: 'btn btn-primary'
                        }
                    ]
                },
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7
            });
            // Add text input to the footer
            $('#single-column-search tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control" placeholder="Search ' + title +
                    '" />');
            });
            // Generate Datatable
            var table = $('#single-column-search').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5, 10, 15, 20],
                "pageLength": 5
            });
            // Search
            table.columns().every(function() {
                var that = this;
                $('input', this.footer()).on('keyup change', function() {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
            var table = $('#toggle-column').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5, 10, 15, 20],
                "pageLength": 5
            });
            $('a.toggle-btn').on('click', function(e) {
                e.preventDefault();
                // Get the column API object
                var column = table.column($(this).attr('data-column'));
                // Toggle the visibility
                column.visible(!column.visible());
                $(this).toggleClass("toggle-clicked");
            });
        });
    </script>
@endpush
