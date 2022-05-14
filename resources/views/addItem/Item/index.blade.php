@extends('layout.master')

@push('plugin-styles')
{!! Html::style('plugins/table/datatable/datatables.css') !!}
{!! Html::style('plugins/table/datatable/dt-global_style.css') !!}


{!! Html::style('plugins/sweetalerts/sweetalert2.min.css') !!}
{!! Html::style('plugins/sweetalerts/sweetalert.css') !!}
{!! Html::style('assets/css/basic-ui/custom_sweetalert.css') !!}


@endpush

@php 

    $modelName = 'App\\Models\\' .$model;
    $Newmodel = new $modelName();
    $arrayItem = $Newmodel->getColumn();
    $arrayTitle = $Newmodel->getTitleColumn();

@endphp



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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Datatables')}}</a></li>
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
                                        <h4 class="table-header">{{ __('backend.'.$model) }}</h4>

                                    </div>
                                    <div class="col-md-6">

                                        <button type="button" class="btn btn-primary mb-2 mr-2 add" data-toggle="modal"
                                            data-target="#Create">{{ __('backend.add') }}</button>

                                    </div>
                                </div>
                              
                                <div class="table-responsive mb-4">
                                    <table id="last-page-dt" class="table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                @foreach ($arrayTitle as $item)
                                                <th>{{ __('backend.'.$item) }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        
                                     
                                
                                        <tbody>
                                            @foreach ($Item as $key => $item)
                                          
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    @if ($item->relation)
                                                    {{-- ( $item->type_id || $item->activitie_id) --}}
                                                    <td>{{ $item->relation->name }}</td>
                                                    @endif
                                                    @if(method_exists( $item, 'showRelation'))
                                                    <td>
                                                        <a href="{{route('Item',['model'=>$item->showRelation(),'id'=>$item->id ])}}" 
                                                            class="btn btn-outline-primary">
                                                            {{ __('backend.Show'.$item->showRelation() ) }}
                                                        </a>
                                                    
                                                    </td>
                                                    @endif
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
                                                                <?php
                                                                $data = [
                                                                    'ID' => $item->id,
                                                                    'model' => $model
                                                                ];
                                                                ?>
                                                               <a class="dropdown-item hh-link-action hh-link-delete-home"
                                                               onclick="Delete(this)"
                                                               data-params="{{ json_encode($data) }}"
                                                               data-action="{{ route('get-item')  }}"
                                                               href="javascript: void(0)"
                                                                    data-type="Show">
                                                                    {{ __('backend.Show') }}</a>

                                                                    <a class="dropdown-item hh-link-action hh-link-delete-home"
                                                                    onclick="Delete(this)"
                                                                    data-params="{{ json_encode($data) }}"
                                                                    data-action="{{ route('get-item')  }}"
                                                                    href="javascript: void(0)"
                                                                    data-type="Edit">
                                                                    {{ __('backend.Edit') }}</a>

                                                                    
                                                                    <a class="dropdown-item hh-link-action hh-link-delete-home"
                                                                    data-action="{{ route('delete-item')  }}"
                                                                    data-parent="tr"
                                                                    data-is-delete="true"
                                                                    onclick="Delete(this)"
                                                                    data-confirm="yes"
                                                                    data-confirm-title="{{__('System Alert')}}"
                                                                    data-confirm-question="{{__('Are you sure want to delete this home?')}}"
                                                                    data-confirm-button="{{__('Delete it!')}}"
                                                                    data-params="{{ json_encode($data) }}"
                                                                    href="javascript: void(0)"> {{ __('backend.Delete') }}
                                                                    
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                @foreach ($arrayTitle as $item)
                                                <th>{{ __('backend.'.$item) }}</th>
                                                @endforeach
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

@include('Common.modal', [
    'model' => $model,
    'action' => 'add-item',
    'id' => 'Create',
    'title' => 'Add '.$model,
]) 
<div id="alert">

</div>

<!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
{!! Html::script('assets/js/loader.js') !!}
{!! Html::script('plugins/sweetalerts/promise-polyfill.js') !!}
{!! Html::script('plugins/sweetalerts/sweetalert2.min.js') !!}
{!! Html::script('assets/js/basicui/sweet_alerts.js') !!}

@endpush


