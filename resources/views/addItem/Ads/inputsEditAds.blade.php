<input type="hidden" name="model" value="{{ $type }}">
@foreach ($itemValue as $kValue => $itemValue)
    
@foreach ($x as $item)
                                                       
                                                             
@if ($item['type'] == 'radio' )
<div class="form-group">
<div class="custom-radio-1">
    @foreach ($item['choices'] as $k => $choices)
    <label for="rdo-{{ $k }}" class="btn-radio">
        <input type="{{ $item['type']  }}" id="rdo-{{ $k }}" name="{{ $item['name'] }}" {{ $kValue == $item['name'] && $choices == $itemValue ? 'checked' :'' }}
        value="{{ $choices }}">
        <svg width="20px" height="20px" viewBox="0 0 20 20">
            <circle cx="10" cy="10" r="9"></circle>
            <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
            <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
        </svg>
        <span>{{ $item['label'] }}</span>
    </label>
    @endforeach
   
</div>
</div>


@elseif($item['type'] == 'select')
<div class="form-group">
<label for="exampleSelectl">{{  $item['label'] }}</label>
<select class="form-control form-control-lg" id="type" name="{{  $item['name'] }}">
 
    @foreach ($item['choices'] as  $choices)

    <option value="{{ $choices['value'] }}"   {{ $kValue == $item['name'] && $choices['value'] == $itemValue ? 'selected' :'' }} >{{ $choices['option'] }}</option>
    @endforeach
</select>
</div>
@else
<div class="form-group">
<label class="fieldlabels">{{ $item['label'] }}</label>
<input type="{{ $item['type'] }}" name="{{ $item['name'] }}" placeholder="" value="{{ ($kValue == $item['name'] ) ? $itemValue : '' }}" class="form-control mb-3"/>
</div>

@endif
@endforeach

@endforeach