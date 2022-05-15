
<input type="hidden" name="model" value="{{ $type }}">
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
    <label
        for="exampleSelectl">{{__('backend.Main Activity')}}</label>
    <select class="form-control form-control-lg" id="mainActivity"
    data-error="#Activity"
    aria-describedby="inputGroupPrepend" required
        name="activitie_id">
        <option  ></option>
      
        @foreach ($x[1] as $activity)
        <option value="{{  $activity->id }}"  
          {{ isset($item) && $item->activity()->first()->id==$activity->id ? 'selected' :'' }} >{{  $activity->name }}</option>
          @endforeach
    </select>
    <div class="errorTxt col-md-6">
      <span class="spanError" id="Activity"></span>
  </div>
  </div>
</div>

  <div class="col-md-6">
    <div class="form-group" >
      <label
          for="exampleSelectl">{{__('backend.Add Activity')}}</label>
      <select class="form-control form-control-lg" id="AddActivity"
      data-error="#errorAddActivity"
      aria-describedby="inputGroupPrepend" required
          name="activitie_Add_id">
        
      </select>
      <div class="errorTxt col-md-6">
        <span class="spanError" id="errorAddActivity"></span>
    </div>
    </div>
  </div>
</div>

<div class="row">

@foreach ($x[0] as $n => $item)

@if ($item['type'] == 'radio' )
{{-- <div class="row"> --}}
  <div class="col-md-12">
<div class="form-group">
    <div class="custom-radio-1">
      <label style="  margin-left: 2%
      ">    {{ $item['label'] }}</label>
        @foreach ($item['choices'] as $k => $choices)
        <label for="rdo-{{ $item['id'] }}-{{ $k }}" class="btn-radio"> 
            <input type="{{ $item['type']  }}" id="rdo-{{ $item['id'] }}-{{ $k }}" name="{{ $item['name'] }}"
                {{ isset($itemValue[$item['name']]) && $choices == $itemValue[$item['name']] ? 'checked' :'' }}
                value="{{ $choices }}">
            <svg width="20px" height="20px" viewBox="0 0 20 20">
                <circle cx="10" cy="10" r="9"></circle>
                <path
                    d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z"
                    class="inner"></path>
                <path
                    d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z"
                    class="outer"></path>
            </svg>
            <span>{{  $choices }}</span>
        </label>

        @endforeach
     

    </div>
</div>
</div>
{{-- </div> --}}

@elseif($item['type'] == 'select')


{{-- <div class="row"> --}}
  <div class="col-md-12">
<div class="form-group ">
  <label for="exampleSelectl">{{  $item['label'] }}</label>
      
          

            <select class="form-control form-control-lg" id="type" 
            name="{{  $item['name'] }}" {{  isset($item['multiple']) ? $item['multiple'] : ''}}>


                    @foreach ($item['choices'] as $choices)

                    <option value="{{ $choices['value'] }}"
                        {{ isset($itemValue[$item['name']]) && $choices['value'] == $itemValue[$item['name']] ? 'selected' :'' }}>
                        {{ $choices['option'] }}</option>
                    @endforeach
                </select>
           
        </div>
    
</div>
</div>

    
{{-- </div> --}}

@elseif($item['type'] == 'on_off')

<div style="align-self: center;"
class="input-group-prepend switch-outer-container {{  $item['class'] }}">

  <div class="col-md-6">
    <label for="">{{  $item['label'] }}</label>
  </div>
  <div class="col-md-6">
    <span
    class="switch switch-outline switch-icon switch-primary">
    <label>

        <input type="checkbox" id="bestPrice" 
          value="{{ isset($itemValue[$item['name']]) ? 'on' : $item['std']   }}"
             name="{{  $item['name']  }}"
            
            @if( $item['std'] == 'on' ||  isset($itemValue[$item['name']]) ) checked @endif>
            
        <span></span>
    </label>
</span>

</div>




</div>


@else
{{-- <div class="row"> --}}
  <div class="{{  isset($item['class']) ? $item['class'] : 'col-md-6'}}">
    <div class="form-group ">
        <label class="fieldlabels">{{ $item['label'] }}</label>
        <input type="{{ $item['type'] }}" name="{{ $item['name'] }}" placeholder=""
            value="{{ isset($itemValue[$item['name']]) ? $itemValue[$item['name']] : '' }}" class="form-control mb-3" />
    </div>
    </div>
  {{-- </div> --}}



@endif


@endforeach
</div>
