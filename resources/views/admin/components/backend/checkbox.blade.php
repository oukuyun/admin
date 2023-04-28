<div class="mb-4">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="{{$value}}" id="{{$name}}" name="{{$name}}" 
        @if($required) required @endif 
        @if($disabled) disabled @endif 
        @if($checked) checked @endif>
        <label class="form-check-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    </div>
    @error($name)
        <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
</div>