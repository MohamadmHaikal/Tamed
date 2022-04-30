@extends('layout.master-auth-manger')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
    {!! Html::style('assets/css/ui-elements/buttons.css') !!}
    {!! Html::style('assets/css/basic-ui/tabs.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">

    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="layout-top-spacing mb-2">
            <div class="col-md-12">
                <div class="">
                    <div class="container p-0">
                        <div class="row layout-top-spacing date-table-container">
                            <!-- Datatable go to last page -->

                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">


                                <div id="tabsWithIcons" class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-header">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4>{{ __('backend.dashboard') }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area rounded-corner-pills-icon">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <ul class="nav nav-pills mb-4 mt-3  justify-content-center"
                                                        id="rounded-corner-pills-icon-tab" role="tablist">
                                                        <li class="nav-item ml-2 mr-2">
                                                            <a class="nav-link mb-2 active text-center"
                                                                id="rounded-corner-pills-icon-home-tab" data-toggle="pill"
                                                                href="#rounded-corner-pills-icon-home" role="tab"
                                                                aria-controls="rounded-corner-pills-icon-home"
                                                                aria-selected="true"><i class="las la-home"></i>
                                                                {{ __('backend.my facility') }}</a>
                                                        </li>
                                                        <li class="nav-item ml-2 mr-2">
                                                            <a class="nav-link mb-2 text-center"
                                                                id="rounded-corner-pills-icon-about-tab" data-toggle="pill"
                                                                href="#rounded-corner-pills-icon-about" role="tab"
                                                                aria-controls="rounded-corner-pills-icon-about"
                                                                aria-selected="false"><i class="las la-user-tie"></i>
                                                                {{ __('backend.Technical support') }}</a>
                                                        </li>

                                                    </ul>
                                                </div>

                                                <div class="col-md-10">
                                                    <div class="tab-content" id="rounded-corner-pills-icon-tabContent">
                                                        <div class="tab-pane fade show active"
                                                            id="rounded-corner-pills-icon-home" role="tabpanel"
                                                            aria-labelledby="rounded-corner-pills-icon-home-tab">
                                                            <div class="row">

                                                                <div class="col-md-4">
                                                                    <div class="card component-card_9">
                                                                        <img src="http://localhost:8000/assets/img/1.jpg"
                                                                            class="card-img-top" alt="widget-card-2">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">
                                                                                {{ __('منصة تعميد') }}</h5>
                                                                            <p class="card-text">
                                                                                {{ __('backend.Commercial record') }} :
                                                                                010300185555</p>
                                                                            <div
                                                                                class="d-flex align-items-center justify-content-around">

                                                                                <div class="d-flex align-items-center">
                                                                                    <div class="text-danger mr-3 "
                                                                                        style="font-size: 15px;">
                                                                                        <i class="las la-bell"></i> 51
                                                                                    </div>
                                                                                    <div class="text-info"
                                                                                        style="font-size: 15px;">
                                                                                        <i class="las la-comments"></i> 250
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex align-items-center">
                                                                                    <button
                                                                                        class="btn btn-success btn-rounded">{{ __('backend.sign in') }}</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="card component-card_9">
                                                                        <img src="http://localhost:8000/assets/img/1.jpg"
                                                                            class="card-img-top" alt="widget-card-2">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">
                                                                                {{ __('منصة تعميد') }}</h5>
                                                                            <p class="card-text">
                                                                                {{ __('backend.Commercial record') }} :
                                                                                010300185555</p>
                                                                            <div
                                                                                class="d-flex align-items-center justify-content-around">

                                                                                <div class="d-flex align-items-center">
                                                                                    <div class="text-danger mr-3"
                                                                                        style="font-size: 15px;">
                                                                                        <i class="las la-bell"></i> 51
                                                                                    </div>
                                                                                    <div class="text-info"
                                                                                        style="font-size: 15px;">
                                                                                        <i class="las la-comments"></i> 250
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex align-items-center">
                                                                                    <button
                                                                                        class="btn btn-success btn-rounded">{{ __('backend.sign in') }}</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="card component-card_9">
                                                                        <img src="http://localhost:8000/assets/img/1.jpg"
                                                                            class="card-img-top" alt="widget-card-2">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">
                                                                                {{ __('منصة تعميد') }}</h5>
                                                                            <p class="card-text">
                                                                                {{ __('backend.Commercial record') }} :
                                                                                010300185555</p>
                                                                            <div
                                                                                class="d-flex align-items-center justify-content-around">

                                                                                <div class="d-flex align-items-center">
                                                                                    <div class="text-danger mr-3"
                                                                                        style="font-size: 15px;">
                                                                                        <i class="las la-bell font"></i> 51
                                                                                    </div>
                                                                                    <div class="text-info"
                                                                                        style="font-size: 15px;">
                                                                                        <i class="las la-comments"></i> 250
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex align-items-center">
                                                                                    <button
                                                                                        class="btn btn-success btn-rounded">{{ __('backend.sign in') }}</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 mt-2">
                                                                    <div class="card component-card_9">
                                                                        <img src="http://localhost:8000/assets/img/1.jpg"
                                                                            class="card-img-top" alt="widget-card-2">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">
                                                                                {{ __('منصة تعميد') }}</h5>
                                                                            <p class="card-text">
                                                                                {{ __('backend.Commercial record') }} :
                                                                                010300185555</p>
                                                                            <div
                                                                                class="d-flex align-items-center justify-content-between">

                                                                                <div class="d-flex align-items-center">
                                                                                    <div class="text-danger mr-3"
                                                                                        style="font-size: 15px;">
                                                                                        <i class="las la-bell"></i> 51
                                                                                    </div>
                                                                                    <div class="text-info"
                                                                                        style="font-size: 15px;">
                                                                                        <i class="las la-comments"></i> 250
                                                                                    </div>

                                                                                </div>
                                                                                <div class="d-flex align-items-center">
                                                                                    <button
                                                                                        class="btn btn-success btn-rounded">{{ __('backend.sign in') }}</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4 mt-2">
                                                                    <a href="javascript:void(0);">
                                                                        <div class="card component-card_9">
                                                                            <div class="card-body text-center" style="margin-bottom: 97px;
                                                                    margin-top: 87px;">
                                                                                <i class="las la-plus-circle "
                                                                                    style="color:gainsboro; margin: auto; font-size: 70px"></i>
                                                                                <h5>{{ __('backend.Open a facility file') }}
                                                                                    </h3>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="rounded-corner-pills-icon-about"
                                                            role="tabpanel"
                                                            aria-labelledby="rounded-corner-pills-icon-about-tab">
                                                            <div class="media">
                                                                <img class="mr-3"
                                                                    src="{{ url('assets/img/profile-10.jpg') }}"
                                                                    alt="Generic placeholder image">
                                                                <div class="media-body">
                                                                    <h5 class="mt-0">{{ __('Media heading') }}
                                                                    </h5>
                                                                    {{ __('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.') }}
                                                                    <div class="media mt-3">
                                                                        <a class="pr-3" href="#">
                                                                            <img src="{{ url('assets/img/profile-11.jpg') }}"
                                                                                alt="Generic placeholder image">
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <h5 class="mt-0">
                                                                                {{ __('Media heading') }}
                                                                            </h5>
                                                                            {{ __('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.') }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="rounded-corner-pills-icon-messages"
                                                            role="tabpanel"
                                                            aria-labelledby="rounded-corner-pills-icon-messages-tab">
                                                            <p>
                                                                {{ __('Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.') }}
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
