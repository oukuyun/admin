<div class="mb-4">
    <label class="form-label">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    <div class="@if($direction == 'horizontal') space-x-2 @else space-y-2 @endif">
        @foreach($options as $key => $option)
        <div class="form-check @if($direction == 'horizontal') form-check-inline @endif">
            <input 
                class="form-check-input" 
                type="radio" 
                id="{{$name}}_{{$option['value']}}" 
                name="{{$name}}" 
                value="{{$option['value']}}" 
                @if($value == $option['value'] || $key == 0) checked @endif 
                @if($disabled) disabled @endif>
            <label class="form-check-label" for="{{$name}}_{{$option['value']}}">{{__($option['name'])}}</label>
        </div>
        @endforeach
    </div>
</div>