<div id="{{$id}}" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
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

                <div class="widget-header">
                    <div class="row">

                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="form-group">
                        <label>{{ __('backend.name of activities') }}</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    
                    <div class="form-group">
                        <label>{{ __('backend.user type') }}</label>
                        <select class="form-control form-control-sm" name="type_id" id="type_id">
                            @foreach ($userType as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach


                        </select>
                    </div>


                </div>

            </div>
            @if ($type!="Show")
                
            
            <div class="modal-footer md-button">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                    {{ __('backend.Cancel') }}</button>
                <button class="btn btn-primary" onclick="{{$onclick}}(this)">{{ __('backend.add') }}</button>
            </div>
            @endif
        </div>
    </div>
</div>