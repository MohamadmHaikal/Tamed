@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('backend.all users') }}</a>
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
                                    <h4 class="table-header">{{ __('backend.all users') }}</h4>
                                    <div class="table-responsive mb-4">
                                        <table id="last-page-dt" class="table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('backend.id') }}</th>
                                                    <th>{{ __('backend.Avatar') }}</th>
                                                    <th>{{ __('backend.name') }}</th>
                                                    <th>{{ __('backend.phone') }}</th>
                                                    <th>{{ __('backend.email') }}</th>
                                                    <th>{{ __('backend.user type') }}</th>
                                                    <th class="no-content"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->id }}</td>
                                                        <td> <img
                                                                src="{{ $user->logo ? url("image/$user->logo") : url('assets/img/avatar.png') }}"
                                                                alt="image" class="rounded-circle avatar-md">
                                                        </td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->phone }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ __('2011/04/25') }}</td>

                                                        <td class="text-center">
                                                            <div class="dropdown custom-dropdown">
                                                                <a class="dropdown-toggle font-20 text-primary" href="#"
                                                                    role="button" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <i class="las la-cog"></i>
                                                                </a>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuLink1"
                                                                    style="will-change: transform;">
                                                                    <a class="dropdown-item"
                                                                        href="javascript:void(0);">{{ __('Edit') }}</a>
                                                                    <a class="dropdown-item"
                                                                        href="javascript:void(0);">{{ __('Delete') }}</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>{{ __('backend.id') }}</th>
                                                    <th>{{ __('backend.Avatar') }}</th>
                                                    <th>{{ __('backend.name') }}</th>
                                                    <th>{{ __('backend.phone') }}</th>
                                                    <th>{{ __('backend.email') }}</th>
                                                    <th>{{ __('backend.user type') }}</th>

                                                    <th></th>
                                                </tr>
                                            </tfoot>
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
    <script>
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
                "pageLength": 6
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
                            extend: 'csv',
                            className: 'btn btn-primary'
                        },
                        {
                            extend: 'excel',
                            className: 'btn btn-primary'
                        },
                        {
                            extend: 'pdf',
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