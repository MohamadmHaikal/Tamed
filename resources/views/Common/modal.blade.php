
@php 
session_start();
    $modelName = 'App\\Models\\' .$model;
    $Newmodel = new $modelName();
    $arrayItem = $Newmodel->getColumn();

@endphp


{{-- <form id="checkout-payment-info" action="{{route($action)  }}"
data-google-captcha="yes"  method="POST"  enctype="multipart/form-data"
class="form checkout-form  relative"> --}}

<form id="form-Item" action="{{route($action)  }}" method="POST" enctype="multipart/form-data"
class="form form-action">

<div id="Create" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
    
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('backend.'.$title)}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>

            <div class="modal-body">
                <h5 id="type"></h5>

                <div class="widget-header">
                    <div class="row">
                        <input type="hidden" name="model" id="model" value="{{ $model }}">
                    </div>
                </div>
                <div class="widget-content widget-content-area" id="widget-content-area">

                    @foreach ($arrayItem as $key => $item)
                    <div class="form-group">
                        <label>{{ __('backend.name of Item') }}</label>
                        <input type="{{ $item->columnType }}" class="form-control" value=" {{ isset( $item->value) }}" name="{{ $item->columnName }}" id="{{ $item->columnName }}">
                    </div>
                    @endforeach

                </div>

            </div>
            
                
            
            <div class="modal-footer md-button" >
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                    {{ __('backend.Cancel') }}</button>
                <button class="btn btn-primary createItem" id="createItem"
                 onclick="Create(this)"
                 >{{ __('backend.add') }}</button>
            </div>
            
        </div>
    </div>
</div>
</form>
@push('custom-scripts')
{!! Html::script('assets/js/myJS.js') !!}
@endpush


